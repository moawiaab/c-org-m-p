<?php

namespace App\Http\Livewire\Shek;

use App\Models\Bank;
use App\Models\Expense;
use App\Models\Project;
use App\Models\Shek;
use Livewire\Component;

class Edit extends Component
{
    public Shek $shek;

    public array $listsForFields = [];

    public function mount(Shek $shek)
    {
        $this->shek = $shek;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.shek.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->shek->save();

        return redirect()->route('admin.sheks.index');
    }

    protected function rules(): array
    {
        return [
            'shek.expense_id' => [
                'integer',
                'exists:expenses,id',
                'nullable',
            ],
            'shek.project_id' => [
                'integer',
                'exists:projects,id',
                'nullable',
            ],
            'shek.amount' => [
                'numeric',
                'nullable',
            ],
            'shek.bank_id' => [
                'integer',
                'exists:banks,id',
                'nullable',
            ],
            'shek.shek_number' => [
                'string',
                'nullable',
            ],
            'shek.entry_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'shek.amount_text' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['expense'] = Expense::pluck('amount', 'id')->toArray();
        $this->listsForFields['project'] = Project::pluck('name', 'id')->toArray();
        $this->listsForFields['bank']    = Bank::pluck('name', 'id')->toArray();
    }
}
