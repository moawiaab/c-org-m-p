<?php

namespace App\Http\Livewire\Permission;

use App\Models\Branch;
use App\Models\Permission;
use Livewire\Component;

class Create extends Component
{
    public Permission $permission;

    public array $listsForFields = [];

    public function mount(Permission $permission)
    {
        $this->permission         = $permission;
        $this->permission->status = '1';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.permission.create');
    }

    public function submit()
    {
        $this->validate();

        $this->permission->save();

        return redirect()->route('admin.permissions.index');
    }

    protected function rules(): array
    {
        return [
            'permission.title' => [
                'string',
                'required',
            ],
            'permission.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
            'permission.br_id' => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status'] = $this->permission::STATUS_RADIO;
        $this->listsForFields['br']     = Branch::pluck('name', 'id')->toArray();
    }
}
