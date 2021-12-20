<?php

namespace App\Http\Livewire\Project;

use App\Models\Area;
use App\Models\Country;
use App\Models\Ctiy;
use App\Models\Donor;
use App\Models\Project;
use App\Models\ProjectBranch;
use App\Models\ProjectDepartment;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public array $user = [];

    public Project $project;

    public array $listsForFields = [];

    public function mount(Project $project)
    {
        $this->project             = $project;
        $this->project->all_amount = '0';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.project.create');
    }

    public function submit()
    {
        $this->validate();

        $this->project->save();
        $this->project->user()->sync($this->user);

        return redirect()->route('admin.projects.index');
    }

    protected function rules(): array
    {
        return [
            'project.name' => [
                'string',
                'required',
            ],
            'project.details' => [
                'string',
                'required',
            ],
            'project.all_amount' => [
                'numeric',
                'nullable',
            ],
            'project.administrative_ratio' => [
                'numeric',
                'nullable',
            ],
            'project.ratio' => [
                'numeric',
                'nullable',
            ],
            'project.beneficiaries_number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'project.project_department_id' => [
                'integer',
                'exists:project_departments,id',
                'nullable',
            ],
            'project.project_branch_id' => [
                'integer',
                'exists:project_branches,id',
                'nullable',
            ],
            'project.donor_id' => [
                'integer',
                'exists:donors,id',
                'required',
            ],
            'user' => [
                'array',
            ],
            'user.*.id' => [
                'integer',
                'exists:users,id',
            ],
            'project.country_id' => [
                'integer',
                'exists:countries,id',
                'nullable',
            ],
            'project.city_id' => [
                'integer',
                'exists:ctiys,id',
                'nullable',
            ],
            'project.area_id' => [
                'integer',
                'exists:areas,id',
                'nullable',
            ],
            'project.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['project_department'] = ProjectDepartment::pluck('name', 'id')->toArray();
        $this->listsForFields['project_branch']     = ProjectBranch::pluck('name', 'id')->toArray();
        $this->listsForFields['donor']              = Donor::pluck('name', 'id')->toArray();
        $this->listsForFields['user']               = User::pluck('name', 'id')->toArray();
        $this->listsForFields['country']            = Country::pluck('name', 'id')->toArray();
        $this->listsForFields['city']               = Ctiy::pluck('name', 'id')->toArray();
        $this->listsForFields['area']               = Area::pluck('name', 'id')->toArray();
        $this->listsForFields['status']             = $this->project::STATUS_RADIO;
    }
}
