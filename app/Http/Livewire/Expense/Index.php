<?php

namespace App\Http\Livewire\Expense;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Branch;
use App\Models\Budget;
use App\Models\Expense;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';
    public Expense $expense;
    public array $listsForFields = [];
    public array $selected = [];
    public $listeners = ['delete', 'postAdded'];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public $postCount;

    public function postAdded(Expense $expense)
    {
        $this->expense  = $expense;
        $this->dispatchBrowserEvent('openModel', ['type' => true]);
    }

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount(Expense $expense)
    {
        $this->expense           = $expense;
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Expense())->orderable;
        $this->initListsForFields();
    }

    public function render()
    {
        $query = Expense::with(['budName', 'budget', 'br', 'user', 'administrative', 'executive', 'financial', 'accountant'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ])->when(auth()->user()->br_id != 1, function ($q) {
            $q->where('br_id', auth()->user()->br_id);
        })->when(auth()->user()->br_id == 1, function ($q) {
            $q->whereIn('br_id', Branch::where('status', 1)->pluck('id'));
        })->when((auth()->user()->status == 2), function ($q) {
            $q->where('stage', 'Executive')->orWhere('user_id', auth()->id());
        })->when((auth()->user()->status == 3), function ($q) {
            $q->where('stage', 'Financial')->orWhere('user_id', auth()->id());
        })->when(((auth()->user()->br_id != 1 && auth()->user()->status == 4) || (auth()->user()->status == 4)), function ($q) {
            $q->where('br_id', auth()->user()->br_id)->where('stage', 'New')->orWhere('user_id', auth()->id());
        })->when((auth()->user()->status === 6), function ($q) {
            $q->where('user_id', auth()->id());
        })->when((auth()->user()->status === 5), function ($q) {
            $q->where('br_id', auth()->user()->br_id)->where('stage', 'End')->orWhere('user_id', auth()->id());
        });
        $expenses = $query->paginate($this->perPage);

        return view('livewire.expense.index', compact('expenses', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('expense_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Expense::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Expense $expense)
    {
        abort_if(Gate::denies('expense_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expense->delete();
        $this->resetSelected();
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent(
            'swal:comfirm',
            [
                'type'  => 'warning',
                'text' => 'Deleted successfully.',
                'title' => 'delete',
                'id' => $id
            ]

        );
    }

    public function deleteAllConfirm()
    {
        $this->dispatchBrowserEvent(
            'swal:comfirmAll',
            [
                'type'  => 'warning',
                'text' => 'Deleted successfully.',
                'title' => 'deleteSelected',
                'id'    => $this->selected
            ]

        );
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['budget']   = Budget::select('budgets.id as id', 'budget_names.name as name')
            ->join('budget_names', 'budget_names.id', '=', 'budgets.budget_id')->where('budgets.br_id', auth()->user()->br_id)->pluck('name', 'id')->toArray();
    }

    public function submit()
    {
        $this->validate();
        // Executive
        // Financial
        // New
        // End
        if ($this->expense->stage == 'New') {
            $this->expense->stage          = 'Executive';
            $this->expense->administrative_id = auth()->id();
        } elseif ($this->expense->stage == 'Executive') {
            $this->expense->stage          = 'Financial';
            $this->expense->executive_id      = auth()->id();
        } elseif ($this->expense->stage == 'Financial') {
            $this->expense->stage          = 'End';
            $this->expense->financial_id      = auth()->id();
        }
        $this->expense->save();
        $this->dispatchBrowserEvent('openModel', ['type' => false]);
    }
    protected function rules(): array
    {
        return [
            'expense.bud_name_id' => [
                'integer',
                'exists:budget_names,id',
                'nullable',
            ],
            'expense.text_amount' => [
                'string',
                'required',
            ],
            'expense.amount' => [
                'string',
                'required',
            ],
            'expense.beneficiary' => [
                'string',
                'required',
            ],
            'expense.details' => [
                'string',
                'required',
            ],
            'expense.feeding' => [
                'string',
                'nullable',
            ],
        ];
    }
}
