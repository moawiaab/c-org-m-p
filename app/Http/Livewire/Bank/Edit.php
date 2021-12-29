<?php

namespace App\Http\Livewire\Bank;

use App\Models\Bank;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;
    public Bank $bank;

    public array $listsForFields = [];

    public function mount(Bank $bank)
    {
        $this->bank = $bank;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.bank.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->bank->save();
        $this->flash('success', trans('global.update_success'));
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
            'bank.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status'] = $this->bank::STATUS_RADIO;
    }
}
