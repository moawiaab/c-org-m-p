<?php

namespace App\Http\Livewire\Donor;

use App\Models\Branch;
use App\Models\Donor;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
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

        $this->donor->save();

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
            'donor.amount' => [
                'numeric',
                'nullable',
            ],
            'donor.br_id' => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'donor.user_id' => [
                'integer',
                'exists:users,id',
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
