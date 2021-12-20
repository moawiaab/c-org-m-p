<?php

namespace App\Http\Livewire\Expense;

use App\Models\Budget;
use App\Models\BudgetName;
use App\Models\Expense;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Expense $expense;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function mount(Expense $expense)
    {
        $this->expense         = $expense;
        $this->expense->amount = '0';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.expense.create');
    }

    public function submit()
    {
        $this->validate();

        $this->expense->save();
        $this->syncMedia();

        return redirect()->route('admin.expenses.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->expense->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'expense.bud_name_id' => [
                'integer',
                'exists:budget_names,id',
                'nullable',
            ],
            'expense.budget_id' => [
                'integer',
                'exists:budgets,id',
                'nullable',
            ],
            'expense.amount' => [
                'numeric',
                'nullable',
            ],
            'expense.text_amount' => [
                'string',
                'required',
            ],
            'expense.beneficiary' => [
                'string',
                'required',
            ],
            'expense.details' => [
                'string',
                'required',
            ],
            'expense.feeding' => [
                'string',
                'nullable',
            ],
            'mediaCollections.expense_invoice' => [
                'array',
                'nullable',
            ],
            'mediaCollections.expense_invoice.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['bud_name'] = BudgetName::pluck('name', 'id')->toArray();
        $this->listsForFields['budget']   = Budget::pluck('amount', 'id')->toArray();
    }
}
