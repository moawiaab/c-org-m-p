<?php

namespace App\Http\Livewire\BudgetName;

use App\Models\Branch;
use App\Models\BudgetName;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public BudgetName $budgetName;

    public array $listsForFields = [];

    public function mount(BudgetName $budgetName)
    {
        $this->budgetName = $budgetName;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.budget-name.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->budgetName->save();

        return redirect()->route('admin.budget-names.index');
    }

    protected function rules(): array
    {
        return [
            'budgetName.name' => [
                'string',
                'required',
                'unique:budget_names,name,' . $this->budgetName->id,
            ],
            'budgetName.details' => [
                'string',
                'nullable',
            ],
            'budgetName.type' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['type'])),
            ],
            'budgetName.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
            'budgetName.br_id' => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'budgetName.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['type']   = $this->budgetName::TYPE_RADIO;
        $this->listsForFields['status'] = $this->budgetName::STATUS_RADIO;
        $this->listsForFields['br']     = Branch::pluck('name', 'id')->toArray();
        $this->listsForFields['user']   = User::pluck('name', 'id')->toArray();
    }
}
