<?php

namespace App\Http\Livewire\ProjectBranch;

use App\Models\Branch;
use App\Models\ProjectBranch;
use App\Models\ProjectDepartment;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    public array $listsForFields = [];

    public ProjectBranch $projectBranch;

    public function mount(ProjectBranch $projectBranch)
    {
        $this->projectBranch = $projectBranch;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.project-branch.create');
    }

    public function submit()
    {
        $this->validate();
        $this->projectBranch->user_id        = auth()->id();
        $this->projectBranch->br_id          = auth()->user()->br_id;

        $this->projectBranch->save();
        $this->flash('success', trans('global.create_success'));
        return redirect()->route('admin.project-branches.index');
    }

    protected function rules(): array
    {
        return [
            'projectBranch.name' => [
                'string',
                'required',
            ],
            'projectBranch.details' => [
                'string',
                'nullable',
            ],
            'projectBranch.proj_id' => [
                'integer',
                'exists:project_departments,id',
                'nullable',
            ],
            'projectBranch.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'projectBranch.br_id' => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['proj'] = ProjectDepartment::pluck('name', 'id')->toArray();
        $this->listsForFields['user'] = User::pluck('name', 'id')->toArray();
        $this->listsForFields['br']   = Branch::pluck('name', 'id')->toArray();
    }
}
