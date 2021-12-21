<?php

namespace App\Http\Livewire\Role;

use App\Models\Branch;
use App\Models\Permission;
use App\Models\Role;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    public Role $role;

    public array $permissions = [];

    public array $listsForFields = [];

    public function mount(Role $role)
    {
        $this->role = $role;
        $this->role->br_id = auth()->user()->br_id; 
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.role.create');
    }

    public function submit()
    {
        $this->validate();

        $this->role->save();
        $this->flash('success', trans('global.create_success'));
        $this->role->permissions()->sync($this->permissions);

        return redirect()->route('admin.roles.index');
    }

    protected function rules(): array
    {
        return [
            'role.title' => [
                'string',
                'required',
            ],
            'permissions' => [
                'required',
                'array',
            ],
            'permissions.*.id' => [
                'integer',
                'exists:permissions,id',
            ],
            'role.br_id' => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['permissions'] = Permission::pluck('title', 'id')->toArray();
        $this->listsForFields['br']          = Branch::where('status', 1)->pluck('name', 'id')->toArray();
    }
}
