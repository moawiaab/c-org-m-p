<?php

namespace App\Http\Livewire\ProjectDepartment;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\ProjectDepartment;
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
        $this->orderable         = (new ProjectDepartment())->orderable;
    }

    public function render()
    {
        $query = ProjectDepartment::with(['user', 'br'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $projectDepartments = $query->paginate($this->perPage);

        return view('livewire.project-department.index', compact('projectDepartments', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('project_department_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        ProjectDepartment::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(ProjectDepartment $projectDepartment)
    {
        abort_if(Gate::denies('project_department_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectDepartment->delete();
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