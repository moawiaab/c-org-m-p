<?php

namespace App\Http\Livewire\BudgetName;

use App\Models\Branch;
use App\Models\BudgetName;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
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
        $this->flash('success', trans('global.update_success'));
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
            'budgetName.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status'] = $this->budgetName::STATUS_RADIO;
    }
}
