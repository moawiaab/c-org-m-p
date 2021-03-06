<?php

namespace App\Http\Livewire\Ratification;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Branch;
use App\Models\Ratification;
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

    public array $selected = [];
    public $listeners = ['delete',  '$refresh'];

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

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Ratification())->orderable;
    }

    public function render()
    {
        $query = Ratification::with(['project', 'projectStage', 'user', 'br', 'projectManager', 'executive', 'financial', 'accountant'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ])->when(auth()->user()->br_id === 1, function ($q) {
            $q->whereIn('br_id', Branch::where('status', 1)->pluck('id'));
        })->when(auth()->user()->br_id != 1, function ($q) {
            $q->where('br_id', auth()->user()->br_id);
        });

        $ratifications = $query->paginate($this->perPage);

        return view('livewire.ratification.index', compact('query', 'ratifications'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('ratification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Ratification::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function deleteConfirm($id = 0)
    {
        $this->alert('question', trans('global.areYouSure'), [
            'showDenyButton' => true,
            'denyButtonText' => trans('global.delete'),
            'showCancelButton' => true,
            'cancelButtonText' => trans('global.cancel'),
            'inputAttributes'  => $id,
            'onDenied' => 'delete',
            'onDismissed' => 'cancelled',
            'position' => 'center',
            'timer' => null
        ]);
    }

    public function delete($data)
    {
        abort_if(Gate::denies('ratification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $id = $data['data']['inputAttributes'];
        if ($id == 0) {
            Ratification::whereIn('id', $this->selected)->delete();
            $this->resetSelected();
            $this->alert('info', trans('global.delete_success'));
        } else {
            $com = Ratification::find($id);
            if ($com->delete()) {
                $this->alert('info', trans('global.delete_success'));
            }
        }
    }
}
