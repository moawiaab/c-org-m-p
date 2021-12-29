<?php

namespace App\Http\Livewire\Bank;

use App\Models\Bank;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use LivewireAlert;
    public Bank $bank;

    public function mount(Bank $bank)
    {
        $this->bank             = $bank;
        $this->bank->amount     = '0';
        $this->bank->amount_in  = '0';
        $this->bank->amount_out = '0';
    }

    public function render()
    {
        return view('livewire.bank.create');
    }

    public function submit()
    {
        $this->validate();
        $this->bank->user_id    = auth()->id();
        $this->bank->br_id      = auth()->user()->br_id;
        $this->bank->amount_in  = 0;
        $this->bank->amount_out = 0;
        $this->bank->status     = 1;

        $this->bank->save();
        $this->flash('success',trans('global.create_success'));
        return redirect()->route('admin.banks.index');
    }

    protected function rules(): array
    {
        return [
            'bank.name' => [
                'string',
                'required',
            ],
            'bank.details' => [
                'string',
                'nullable',
            ],
            'bank.number' => [
                'string',
                'nullable',
            ],
            'bank.amount' => [
                'numeric',
                'nullable',
            ],

        ];
    }
}
