<?php

namespace App\Http\Livewire\BankAmount;

use App\Models\Bank;
use App\Models\BankAmount;
use Livewire\Component;

class Edit extends Component
{
    public BankAmount $bankAmount;

    public array $listsForFields = [];

    public function mount(BankAmount $bankAmount)
    {
        $this->bankAmount = $bankAmount;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.bank-amount.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->bankAmount->save();

        return redirect()->route('admin.bank-amounts.index');
    }

    protected function rules(): array
    {
        return [
            'bankAmount.bank_from_id' => [
                'integer',
                'exists:banks,id',
                'nullable',
            ],
            'bankAmount.bank_to_id' => [
                'integer',
                'exists:banks,id',
                'nullable',
            ],
            'bankAmount.amount' => [
                'numeric',
                'nullable',
            ],
            'bankAmount.details' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['bank_from'] = Bank::pluck('name', 'id')->toArray();
        $this->listsForFields['bank_to']   = Bank::pluck('name', 'id')->toArray();
    }
}
