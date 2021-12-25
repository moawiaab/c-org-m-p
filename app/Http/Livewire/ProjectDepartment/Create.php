<?php

namespace App\Http\Livewire\ProjectDepartment;

use App\Models\ProjectDepartment;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    public ProjectDepartment $projectDepartment;

    public function mount(ProjectDepartment $projectDepartment)
    {
        $this->projectDepartment = $projectDepartment;
    }

    public function render()
    {
        return view('livewire.project-department.create');
    }

    public function submit()
    {
        $this->validate();
        $this->projectDepartment->user_id        = auth()->id();
        $this->projectDepartment->br_id          = auth()->user()->br_id;
        $this->projectDepartment->save();
        $this->flash('success', trans('global.create_success'));
        return redirect()->route('admin.project-departments.index');
    }

    protected function rules(): array
    {
        return [
            'projectDepartment.name' => [
                'string',
                'nullable',
            ],
            'projectDepartment.details' => [
                'string',
                'nullable',
            ],
        ];
    }
}
