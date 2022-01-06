<?php

namespace App\Http\Livewire\ProjectStage;

use App\Models\ProjectStage;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
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
        $this->flash('success', trans('global.update_success'));
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
            'projectStage.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
            'user' => [
                'array',
            ],
            'user.*.id' => [
                'integer',
                'exists:users,id',
            ],
     
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status']       = $this->projectStage::STATUS_RADIO;
        $this->listsForFields['user']         = User::pluck('name', 'id')->toArray();

    }
}
