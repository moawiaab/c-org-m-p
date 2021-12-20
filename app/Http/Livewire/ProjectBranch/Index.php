<?php

namespace App\Http\Livewire\ProjectBranch;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\ProjectBranch;
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
        $this->orderable         = (new ProjectBranch())->orderable;
    }

    public function render()
    {
        $query = ProjectBranch::with(['proj', 'user', 'br'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $projectBranches = $query->paginate($this->perPage);

        return view('livewire.project-branch.index', compact('projectBranches', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('project_branch_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        ProjectBranch::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(ProjectBranch $projectBranch)
    {
        abort_if(Gate::denies('project_branch_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectBranch->delete();
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