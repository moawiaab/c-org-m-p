<?php

namespace App\Http\Livewire\FiscalYear;

use App\Models\Branch;
use App\Models\FiscalYear;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    public FiscalYear $fiscalYear;

    public array $listsForFields = [];

    public function mount(FiscalYear $fiscalYear)
    {
        $this->fiscalYear = $fiscalYear;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.fiscal-year.edit');
    }

    public function submit()
    {
        $this->validate();

        //TODO: move bank amount to new years 
        $this->fiscalYear->save();
        $this->flash('success',trans('global.update_success'));
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
