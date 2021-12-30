<?php

namespace App\Http\Livewire\Expense;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Bank;
use App\Models\Branch;
use App\Models\Budget;
use App\Models\Expense;
use App\Models\Shek;
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
    public $budName;
    public $user;
    public $brach;
    public $amount;
    public $amount_text;
    public $stage = '';
    public $beneficiary;
    public $administrative;
    public $executive;
    public $financial;
    public $created_at;
    public $bank_id;
    public $entry_date;
    public $shek_number;
    public Shek $shek;

    public string $search = '';
    public Expense $expense;
    public array $listsForFields = [];
    public array $selected = [];
    public $listeners = ['delete', 'postAdded', 'endExpens'];

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
        $this->expense  = $expense->load('budName', 'user', 'br', 'administrative', 'executive', 'financial');
        $this->budName        = $this->expense->budName->name;
        $this->administrative = $this->expense->administrative ? $this->expense->administrative->name : '';
        $this->executive      = $this->expense->executive ? $this->expense->executive->name : '';
        $this->financial      = $this->expense->financial ? $this->expense->financial->name : '';
        $this->user           = $this->expense->user->name;
        $this->brach          = $this->expense->br->name;
        $this->amount         = $this->expense->amount;
        $this->amount_text    = $this->expense->text_amount;
        $this->stage          = $this->expense->stage;
        $this->beneficiary    = $this->expense->beneficiary;
        $this->created_at    = $this->expense->created_at->diffForHumans();
        if ($this->stage === 'End') {
            $this->shek = new Shek();
        }
        // dd( $this->expense->budName->name);
        $this->dispatchBrowserEvent('openModel', ['type' => true]);
    }

    // public function endExpens(Expense $expense)
    // {
    //     $this->expense  = $expense;
    //     $this->dispatchBrowserEvent('openModel', ['type' => true]);
    // }

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

    public function submitamount()
    {
        dd($this->expense);
    }
    public function submit()
    {
        $this->validate();

        dd($this->bank_id);
        // Executive
        // Financial
        // New
        // End
        if ($this->expense->stage === 'New') {
            $this->expense->stage          = 'Executive';
            $this->expense->administrative_id = auth()->id();
        } elseif ($this->expense->stage === 'Executive') {
            $this->expense->stage          = 'Financial';
            $this->expense->executive_id      = auth()->id();
        } elseif ($this->expense->stage === 'Financial') {
            //TODO: teg Amount from Expense
            $this->expense->stage          = 'End';
            $this->expense->financial_id      = auth()->id();
        } elseif ($this->expense->stage === 'End') {
            $this->expense->stage          = 'Finsh';
            $this->expense->accountant_id      = auth()->id();
            if ($this->expense->save()) {
                $this->shek->expense_id   = $this->expense->id;
                $this->shek->type         = 1;
                $this->shek->amount       = $this->expense->amount;
                $this->shek->bank_id      = $this->bank_id;
                $this->shek->user_id      = auth()->id();
                $this->shek->br_id        = auth()->user()->br_id;
                $this->shek->shek_number  = $this->shek_number;
                $this->shek->entry_date   = $this->entry_date;
                $this->shek->amount_text  = $this->expense->text_amount;
                $this->shek->status       = 1;
                if ($this->shek->save()) {
                    //TODO: check For teg amount now or after shek
                    return redirect()->route('admin.expenses.print', $this->expense->id);
                }
            }
        }
        $this->expense->save();
        $this->dispatchBrowserEvent('openModel', ['type' => false]);
    }
    protected function rules(): array
    {
        return [
            'expense.details' => [
                'string',
                'required',
            ],
            'expense.feeding' => [
                'string',
                'nullable',
            ],
            // 'shek.shek_number' => [
            //     'string',
            //     'required',
            // ],
            // 'shek.entry_date' => [
            //     'required',
            //     'date_format:' . config('project.date_format'),
            // ],

        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['bank']    = Bank::pluck('name', 'id')->toArray();
    }
}
