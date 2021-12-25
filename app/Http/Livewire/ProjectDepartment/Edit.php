<?php

namespace App\Http\Livewire\ProjectDepartment;

use App\Models\ProjectDepartment;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    public ProjectDepartment $projectDepartment;

    public function mount(ProjectDepartment $projectDepartment)
    {
        $this->projectDepartment = $projectDepartment;
    }

    public function render()
    {
        return view('livewire.project-department.edit');
    }

    public function submit()
    {
        $this->validate();

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
