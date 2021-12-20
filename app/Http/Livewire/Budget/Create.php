<?php

namespace App\Http\Livewire\Budget;

use App\Models\Branch;
use App\Models\Budget;
use App\Models\BudgetName;
use App\Models\FiscalYear;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    public Budget $budget;
    private $fisc;
    public array $listsForFields = [];

    public function mount(Budget $budget)
    {
        $this->budget                 = $budget;
        $this->budget->amount         = '0';
        $this->budget->expense_amount = '0';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.budget.create');
    }

    public function submit()
    {
        $this->validate();
        $br = Branch::find(auth()->user()->br_id);
        if ($br->status == 1) {
            $fisc = FiscalYear::whereIn('br_id', Branch::where('status', 1)->pluck('id'))->where('status', 1)->first();
        } else {
            $fisc = FiscalYear::where('br_id', auth()->user()->br_id)->where('status', 1)->first();
        }
        if ($fisc === null) {
            $this->flash('error', trans('global.f_open'));
            return redirect()->route('admin.budgets.index');
        } else {
            $this->budget->user_id        = auth()->id();
            $this->budget->br_id          = auth()->user()->br_id;
            $this->budget->expense_amount = 0;
            $this->budget->fiscal_year_id = $fisc->id;
            $this->budget->status         = 1;
            $this->budget->save();
            $this->flash('success', trans('global.create_success'));
            return redirect()->route('admin.budgets.index');
        }
    }

    protected function rules(): array
    {
        return [
            'budget.budget_id' => [
                'integer',
                'exists:budget_names,id',
                'required',
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

        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['budget']      = BudgetName::whereNotIn('id', Budget::where([['br_id', auth()->user()->br_id], ['status', 1]])->pluck('budget_id'))
        ->where('type', 1)->orWhere('br_id', auth()->user()->br_id)->pluck('name', 'id')->toArray();
    }
}
