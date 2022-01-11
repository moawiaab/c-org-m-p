<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use LivewireUI\Modal\ModalComponent;

class Open extends ModalComponent
{
    use LivewireAlert;
    public Project $project;

    public function mount($projectId) {

        $this->project           = Project::find($projectId);
    }
    public function render()
    {
        return view('livewire.project.open');
    }

    public function submit (){
        $this->project->status = 1;
        $this->project->save();
        $this->alert('success', trans('global.update_success'));
        $this->emitTo('project.index', '$refresh');
        $this->closeModal();
    }
}
