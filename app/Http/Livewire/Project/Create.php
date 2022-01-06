<?php

namespace App\Http\Livewire\Project;

use App\Models\Area;
use App\Models\Branch;
use App\Models\Country;
use App\Models\Ctiy;
use App\Models\Donor;
use App\Models\Project;
use App\Models\ProjectBranch;
use App\Models\ProjectDepartment;
use App\Models\ProjectStage;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    public array $user = [];

    public array $phases = [];

    public array $partners = [];

    // public $listeners = ['citys'];

    public Project $project;
    public $city = null;
    public $area;
    public $country;
    public $cityId;
    public $area_id;
    public $ratio;
    public $project_branch;
    public $project_branch_id;
    public $department;
    public array $listsForFields = [];

    public function mount(Project $project)
    {
        $this->project                       = $project;
        // $this->project->all_amount           = '0';
        // $this->listsForFields['project_branch'] = [];
        $this->project->administrative_ratio = '5';
        $this->initListsForFields();
    }

    public function updatedCountry($id)
    {
        $this->city = Ctiy::where('country_id', $id)->get();
        $this->cityId =  $this->city->first() ? $this->city->first()->id : null;
        $this->area = Area::where('city_id', $this->city->first() ? $this->city->first()->id : 0)->get();
        $this->area_id =  $this->area->first() ? $this->area->first()->id : null;
        // dd($this->city);
    }
    public function updateAmount()
    {
        $this->project->ratio = (float)$this->project->all_amount * (float)$this->project->administrative_ratio / 100;
    }
    public function updatedDepartment($id)
    {
        $this->project_branch     = ProjectBranch::where('proj_id', $id)->get();
        // $this->project->project_branch_id = $this->project_branch->first()->id;
    }
    // public function updateRatio()
    // {
    //     $this->project->ratio = (float)$this->project->all_amount * (float)$this->project->administrative_ratio / 100;
    // }
    public function updatedCityId($id)
    {
        $this->area = Area::where('city_id', $id)->get();
        $this->area_id =  $this->area->first() ? $this->area->first()->id : null;
    }

    public function render()
    {



        // dd($this->city);
        return view('livewire.project.create');
    }

    public function submit()
    {
        $this->validate();
        $donor = Donor::find($this->project->donor_id);
        $donor->amount = $this->project->all_amount;
        // $donor->save();

        $this->project->project_department_id = $this->department;
        $this->project->project_branch_id     = $this->project_branch_id;
        $this->project->country_id            = $this->country;
        $this->project->city_id               = $this->cityId;
        $this->project->area_id               = $this->area_id;
        $this->project->branch_id             = auth()->user()->br_id;
        $this->project->status                = 2;
        $this->project->expense_amount        = 0;
        $this->project->reserved_amount       = 0;
        // dd($this->project, $donor, $this->country,$this->cityId,$this->area_id);
        $this->project->save();
        $this->flash('success', trans('global.create_success'));
        $this->project->user()->sync($this->user);
        $this->project->phases()->sync($this->phases);
        $this->project->partners()->sync($this->partners);
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
            'project_branch_id' => [
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
            'phases' => [
                'array',
            ],
            'phases.*.id' => [
                'integer',
                'exists:project_stages,id',
            ],
            'partners' => [
                'array',
            ],
            'partners.*.id' => [
                'integer',
                'exists:brabches,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['project_department'] = ProjectDepartment::pluck('name', 'id')->toArray();
        $this->listsForFields['donor']              = Donor::pluck('name', 'id')->toArray();
        $this->listsForFields['user']               = User::pluck('name', 'id')->toArray();
        $this->listsForFields['country']            = Country::pluck('name', 'id')->toArray();
        // $this->listsForFields['city']               = Ctiy::pluck('name', 'id')->toArray();
        // $this->listsForFields['area']               = Area::pluck('name', 'id')->toArray();
        $this->listsForFields['status']             = $this->project::STATUS_RADIO;
        $this->listsForFields['phases']             = ProjectStage::pluck('name', 'id')->toArray();
        $this->listsForFields['partners']           = Branch::pluck('name', 'id')->toArray();
    }
}
