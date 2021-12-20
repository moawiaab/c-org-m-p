<?php

namespace App\Http\Livewire\ProjectStage;

use App\Models\Branch;
use App\Models\Project;
use App\Models\ProjectStage;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public array $user = [];

    public array $listsForFields = [];

    public ProjectStage $projectStage;

    public function mount(ProjectStage $projectStage)
    {
        $this->projectStage = $projectStage;
        $this->user         = $this->projectStage->user()->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.project-stage.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->projectStage->save();
        $this->projectStage->user()->sync($this->user);

        return redirect()->route('admin.project-stages.index');
    }

    protected function rules(): array
    {
        return [
            'projectStage.name' => [
                'string',
                'nullable',
            ],
            'projectStage.details' => [
                'string',
                'nullable',
            ],
            'projectStage.amount' => [
                'numeric',
                'nullable',
            ],
            'projectStage.start_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'projectStage.end_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'projectStage.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
            'projectStage.project_id' => [
                'integer',
                'exists:projects,id',
                'nullable',
            ],
            'user' => [
                'array',
            ],
            'user.*.id' => [
                'integer',
                'exists:users,id',
            ],
            'projectStage.br_id' => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'projectStage.user_created_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status']       = $this->projectStage::STATUS_RADIO;
        $this->listsForFields['project']      = Project::pluck('name', 'id')->toArray();
        $this->listsForFields['user']         = User::pluck('name', 'id')->toArray();
        $this->listsForFields['br']           = Branch::pluck('name', 'id')->toArray();
        $this->listsForFields['user_created'] = User::pluck('name', 'id')->toArray();
    }
}
