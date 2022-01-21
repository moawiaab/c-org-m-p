<?php

namespace App\Http\Livewire\StageDetail;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\StageDetail;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public $stage;
    public $stageId;
    protected $stageD;
    public $project;
    public $amount;
    public $status;
    public $feeding;
    public array $orderable;

    public string $search = '';

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

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function mount($stage, $project, $stageId)
    {
        $stageD                  =  DB::table('project_project_stage')->where('project_id', $project)->where('project_stage_id', $stageId)->first();
        $this->stage             =  $stage;
        $this->stageId           =  $stageId;
        $this->amount            =  $stageD->amount;
        $this->status            =  $stageD->status;
        $this->feeding           =  $stageD->feeding === null ? ' ' : $stageD->feeding;

        $this->project           = $project;
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new StageDetail())->orderable;
    }

    public function render()
    {
        // dd(json_encode([$this->stageD]));
        $query = StageDetail::with(['stage', 'project'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ])->where('stage_id',$this->stageId)->where('project_id', $this->project);
        $stageDetails = $query->paginate($this->perPage);
        return view('livewire.stage-detail.index', compact('query', 'stageDetails'));
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
        // abort_if(Gate::denies('company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $id = $data['data']['inputAttributes'];
        if ($id == 0) {
            StageDetail::whereIn('id', $this->selected)->delete();
            $this->resetSelected();
            $this->alert('info', trans('global.delete_success'));
        } else {
            $com = StageDetail::find($id);
            if ($com->delete()) {
                $this->alert('info', trans('global.delete_success'));
            }
        }
    }
}
