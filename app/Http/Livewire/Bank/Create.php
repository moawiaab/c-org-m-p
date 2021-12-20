<?php

namespace App\Http\Livewire\Bank;

use App\Models\Bank;
use Livewire\Component;

class Create extends Component
{
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

        $this->bank->save();

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
            'bank.amount_in' => [
                'numeric',
                'nullable',
            ],
            'bank.amount_out' => [
                'numeric',
                'nullable',
            ],
        ];
    }
}
