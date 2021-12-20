<?php

namespace App\Http\Livewire\ProjectDepartment;

use App\Models\ProjectDepartment;
use Livewire\Component;

class Create extends Component
{
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

        $this->projectDepartment->save();

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
