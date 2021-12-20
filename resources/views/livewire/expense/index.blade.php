<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('expense_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    <i class="far fa-trash-alt text-danger" title=" {{ __('Delete Selected') }}"></i>
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Expense" format="csv" />
                <livewire:excel-export model="Expense" format="xlsx" />
                <livewire:excel-export model="Expense" format="pdf" />
            @endif


            @can('expense_create')
                <x-csv-import route="{{ route('admin.expenses.csv.store') }}" />
            @endcan

        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.expense.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.bud_name') }}
                            @include('components.table.sort', ['field' => 'bud_name.name'])
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.budget') }}
                            @include('components.table.sort', ['field' => 'budget.amount'])
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.br') }}
                            @include('components.table.sort', ['field' => 'br.name'])
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.amount') }}
                            @include('components.table.sort', ['field' => 'amount'])
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.text_amount') }}
                            @include('components.table.sort', ['field' => 'text_amount'])
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.beneficiary') }}
                            @include('components.table.sort', ['field' => 'beneficiary'])
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.details') }}
                            @include('components.table.sort', ['field' => 'details'])
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.feeding') }}
                            @include('components.table.sort', ['field' => 'feeding'])
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.stage') }}
                            @include('components.table.sort', ['field' => 'stage'])
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.invoice') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($expenses as $expense)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $expense->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $expense->id }}
                            </td>
                            <td>
                                @if($expense->budName)
                                    <span class="badge badge-relationship">{{ $expense->budName->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($expense->budget)
                                    <span class="badge badge-relationship">{{ $expense->budget->amount ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($expense->br)
                                    <span class="badge badge-relationship">{{ $expense->br->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($expense->user)
                                    <span class="badge badge-relationship">{{ $expense->user->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $expense->amount }}
                            </td>
                            <td>
                                {{ $expense->text_amount }}
                            </td>
                            <td>
                                {{ $expense->beneficiary }}
                            </td>
                            <td>
                                {{ $expense->details }}
                            </td>
                            <td>
                                {{ $expense->feeding }}
                            </td>
                            <td>
                                {{ $expense->stage }}
                            </td>
                            <td>
                                @foreach($expense->invoice as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('expense_show')
                                        <a class="btn btn-sm  mr-2" href="{{ route('admin.expenses.show', $expense) }}">
                                            <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                                        </a>
                                    @endcan
                                    @can('expense_edit')
                                        <a class="btn btn-sm mr-2" href="{{ route('admin.expenses.edit', $expense) }}">
                                            <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                                        </a>
                                    @endcan
                                    @can('expense_delete')
                                        <button class="btn btn-sm mr-2" type="button" wire:click="confirm('delete', {{ $expense->id }})" wire:loading.attr="disabled">
                                            <i class="far fa-trash-alt text-danger" title="{{ trans('global.delete') }}"></i>
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $expenses->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush