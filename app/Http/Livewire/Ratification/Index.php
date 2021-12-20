<?php

namespace App\Http\Livewire\Ratification;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
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
    public $listeners = ['delete'];

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
        ]);

        $ratifications = $query->paginate($this->perPage);

        return view('livewire.ratification.index', compact('query', 'ratifications'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('ratification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Ratification::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Ratification $ratification)
    {
        abort_if(Gate::denies('ratification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ratification->delete();
        $this->resetSelected();
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent(
            'swal:comfirm',
            [
                'type'  => 'warning',
                'text' => 'are yuo suory',
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
                'text' => 'are yuo suory',
                'title' => 'deleteSelected',
                'id'    => $this->selected
            ]

        );
    }
}