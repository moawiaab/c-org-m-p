<?php

namespace App\Http\Livewire\ProjectStage;

use App\Models\Branch;
use App\Models\Project;
use App\Models\ProjectStage;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    public array $user = [];

    public array $listsForFields = [];

    public ProjectStage $projectStage;

    public function mount(ProjectStage $projectStage)
    {
        $this->projectStage         = $projectStage;
    }

    public function render()
    {
        return view('livewire.project-stage.create');
    }

    public function submit()
    {
        $this->validate();

        $this->projectStage->br_id  = auth()->user()->br_id;
        $this->projectStage->status = 1;
        $this->projectStage->save();
        $this->flash('success', trans('global.create_success'));

        return redirect()->route('admin.project-stages.index');
    }

    protected function rules(): array
    {
        return [
            'projectStage.name' => [
                'string',
                'required',
            ],
            'projectStage.details' => [
                'string',
                'required',
            ],
            'projectStage.br_id' => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
        ];
    }

}
