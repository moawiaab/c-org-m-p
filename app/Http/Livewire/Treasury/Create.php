<?php

namespace App\Http\Livewire\Treasury;

use App\Models\Treasury;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    public Treasury $treasury;

    public function mount(Treasury $treasury)
    {
        $this->treasury = $treasury;
    }

    public function render()
    {
        return view('livewire.treasury.create');
    }

    public function submit()
    {
        $this->validate();

        $this->treasury->user_id          = auth()->id();
        $this->treasury->br_id            = auth()->user()->br_id;
        $this->treasury->amount           = 0;
        $this->treasury->incoming_amount  = 0;
        $this->treasury->expense_amount   = 0;

        $this->treasury->save();
        $this->flash('success', trans('global.create_success'));
        return redirect()->route('admin.treasuries.index');
    }

    protected function rules(): array
    {
        return [
            'treasury.name' => [
                'string',
                'required',
            ],
        ];
    }
}
