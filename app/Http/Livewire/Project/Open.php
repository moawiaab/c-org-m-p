<?php

namespace App\Http\Livewire\Project;

use App\Models\Donor;
use App\Models\Project;
use App\Models\ProjectDetail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use LivewireUI\Modal\ModalComponent;

class Open extends ModalComponent
{
    use LivewireAlert;
    public Project $project;
    public ProjectDetail $projectDetail;

    public function mount($projectId, ProjectDetail $projectDetail)
    {

        $this->projectDetail     = $projectDetail;
        $this->project           = Project::find($projectId);
    }
    public function render()
    {
        return view('livewire.project.open');
    }
    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
    public function submit()
    {
        $this->validate();
        $proDetail = ProjectDetail::find($this->project->id);
        $donor = Donor::find($this->project->donor_id);
        $this->project->status = 1;
        if ($proDetail) {
            $this->projectDetail->project_id = $this->project->id;
        } else {
            $this->projectDetail->project_id = $this->project->id;
            $this->projectDetail->user_id = auth()->id();
            $donor->amount += $this->project->all_amount;
        }
        if ($this->projectDetail->save()) {
            $this->project->save();
            $donor->save();
        }
        $this->closeModal();
        $this->alert('success', trans('global.opening_last'));
        $this->emitTo('project.index', '$refresh');
    }

    protected function rules(): array
    {
        return [
            'projectDetail.longitude' => [
                'numeric',
                'nullable'
            ],
            'projectDetail.latitude' => [
                'numeric',
                'nullable'
            ],
            'projectDetail.details' => [
                'string',
                'required',
                'min:5'
            ],
            'projectDetail.place' => [
                'string',
                'required',
                'min:5'
            ],
            'projectDetail.beneficiary_category' => [
                'string',
                'required',
            ]
        ];
    }
}
