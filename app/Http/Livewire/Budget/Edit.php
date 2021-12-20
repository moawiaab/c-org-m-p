<?php

namespace App\Http\Livewire\Budget;

use App\Models\Branch;
use App\Models\Budget;
use App\Models\BudgetName;
use App\Models\FiscalYear;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public Budget $budget;

    public array $listsForFields = [];

    public function mount(Budget $budget)
    {
        $this->budget = $budget;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.budget.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->budget->save();

        return redirect()->route('admin.budgets.index');
    }

    protected function rules(): array
    {
        return [
            'budget.budget_id' => [
                'integer',
                'exists:budget_names,id',
                'required',
            ],
            'budget.br_id' => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'budget.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'budget.fiscal_year_id' => [
                'integer',
                'exists:fiscal_years,id',
                'nullable',
            ],
            'budget.amount' => [
                'numeric',
                'required',
            ],
            'budget.expense_amount' => [
                'numeric',
                'nullable',
            ],
            'budget.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['budget']      = BudgetName::pluck('name', 'id')->toArray();
        $this->listsForFields['br']          = Branch::pluck('name', 'id')->toArray();
        $this->listsForFields['user']        = User::pluck('name', 'id')->toArray();
        $this->listsForFields['fiscal_year'] = FiscalYear::pluck('date', 'id')->toArray();
        $this->listsForFields['status']      = $this->budget::STATUS_RADIO;
    }
}
