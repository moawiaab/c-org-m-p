<?php

namespace App\Http\Livewire\FiscalYear;

use App\Models\Branch;
use App\Models\FiscalYear;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public FiscalYear $fiscalYear;

    public array $listsForFields = [];

    public function mount(FiscalYear $fiscalYear)
    {
        $this->fiscalYear = $fiscalYear;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.fiscal-year.create');
    }

    public function submit()
    {
        $this->validate();

        $this->fiscalYear->save();

        return redirect()->route('admin.fiscal-years.index');
    }

    protected function rules(): array
    {
        return [
            'fiscalYear.amount' => [
                'string',
                'nullable',
            ],
            'fiscalYear.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
            'fiscalYear.date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'fiscalYear.br_id' => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'fiscalYear.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status'] = $this->fiscalYear::STATUS_RADIO;
        $this->listsForFields['br']     = Branch::pluck('name', 'id')->toArray();
        $this->listsForFields['user']   = User::pluck('name', 'id')->toArray();
    }
}
