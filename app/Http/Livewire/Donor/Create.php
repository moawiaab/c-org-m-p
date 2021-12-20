<?php

namespace App\Http\Livewire\Donor;

use App\Models\Branch;
use App\Models\Donor;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    public Donor $donor;

    public array $listsForFields = [];

    public function mount(Donor $donor)
    {
        $this->donor = $donor;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.donor.create');
    }

    public function submit()
    {
        $this->validate();

        $this->donor->user_id = auth()->id();
        $this->donor->br_id   = auth()->user()->br_id;
        $this->donor->amount = 0;
        $this->donor->save();
        $this->flash('success',trans('global.create_success'));
        return redirect()->route('admin.donors.index');
    }

    protected function rules(): array
    {
        return [
            'donor.name' => [
                'string',
                'required',
            ],
            'donor.details' => [
                'string',
                'nullable',
            ],
            'donor.phone' => [
                'string',
                'nullable',
            ],
            'donor.email' => [
                'email:rfc',
                'required',
            ],
            'donor.address' => [
                'string',
                'nullable',
            ],

      
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['br']   = Branch::pluck('name', 'id')->toArray();
        $this->listsForFields['user'] = User::pluck('name', 'id')->toArray();
    }
}
