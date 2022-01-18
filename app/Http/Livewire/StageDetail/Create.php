<?php

namespace App\Http\Livewire\StageDetail;

use App\Models\Project;
use App\Models\ProjectStage;
use App\Models\StageDetail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
// use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends ModalComponent
{
    use LivewireAlert;
    public StageDetail $stageDetail;
    public $stage;
    public $project;

    public function mount(StageDetail $stageDetail, $project, $stage)
    {
        $this->stageDetail             = $stageDetail;
        $this->stage                   = $stage;
        $this->project                 = $project;
    }

    public function render()
    {
        return view('livewire.stage-detail.create');
    }

    public function submit()
    {
        $this->validate();
        $this->stageDetail->project_id = $this->project;
        $this->stageDetail->stage_id   = $this->stage;
        $this->stageDetail->save();
        $this->closeModal();
        $this->alert('success', trans('global.create_success'));
        $this->emitTo('stage-detail.index', '$refresh');
    }

    protected function rules(): array
    {
        return [

            'stageDetail.details' => [
                'string',
                'required',
            ],
            'stageDetail.name' => [
                'string',
                'required',
            ],
        ];
    }
}
