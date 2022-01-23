<?php

namespace App\Http\Livewire\Donor;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Branch;
use App\Models\Donor;
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
    public $listeners = ['delete', '$refresh'];

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
        $this->orderable         = (new Donor())->orderable;
    }

    public function render()
    {
        $query = Donor::with(['br', 'user'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ])->when(auth()->user()->br_id === 1, function ($q) {
            $q->whereIn('br_id', Branch::where('status', 1)->pluck('id'));
        })->when(auth()->user()->br_id != 1, function ($q) {
            $q->where('br_id', auth()->user()->br_id);
        });

        $donors = $query->paginate($this->perPage);

        return view('livewire.donor.index', compact('query', 'donors', 'donors'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('donor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Donor::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Donor $donor)
    {
        abort_if(Gate::denies('donor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $donor->delete();
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
}
