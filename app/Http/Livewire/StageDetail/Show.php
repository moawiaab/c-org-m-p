<?php

namespace App\Http\Livewire\StageDetail;

use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use LivewireUI\Modal\ModalComponent;

class Show extends ModalComponent
{
    use LivewireAlert;
    public $stage;
    public $stageId;
    public $status;
    public $feeding;
    public $project;
    public $type;
    public $statusId;
    // public $updated_at;

    public function mount($stage, $project,  $amount, $status, $feeding, $stageId)
    {
        $this->amount               = $amount;
        $this->status               = $status;
        $this->feeding              = $feeding;
        $this->project              = $project;
        $this->stageId              = $stageId;
        $this->type                 = 1;
        // $this->project_stage_id     = $project_stage_id;
        // $this->created_at     = $created_at;
        // $this->updated_at     = $updated_at;
        // // dd($amount);
        $this->stage               = $stage;
    }

    public function render()
    {
        return view('livewire.stage-detail.show');
    }

    public function submit()
    {
        DB::update('update project_project_stage set feeding = "' . $this->feeding . '", status = "' . $this->status . '" where project_id = '.$this->stageId.' And project_stage_id = '. $this->project);
        $this->closeModal();
        $this->alert('success', trans('global.update_success'));
        $this->emitTo('stage-detail.index', '$refresh');
    }
    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}
