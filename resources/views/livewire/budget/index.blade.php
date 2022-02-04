<div>
    <div class="card-controls sm:flex row">
        <div class="w-full sm:w-1/2 col-md-6">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('budget_delete')
                <button class="btn btn-sm ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="deleteAllConfirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    <i class="far fa-trash-alt text-danger" title=" {{ __('Delete Selected') }}"></i>
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Budget" format="csv" />
                <livewire:excel-export model="Budget" format="xlsx" />
                <livewire:excel-export model="Budget" format="pdf" />
            @endif


            @can('budget_create')
                <x-csv-import route="{{ route('admin.budgets.csv.store') }}" />
            @endcan

        </div>
        <div class="w-full sm:w-1/2 col-md-6 sm:text-right">
            <input type="text" wire:model.debounce.300ms="search" class="inline-block form-control" placeholder="{{ trans('global.search') }}"/>
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
                            {{ trans('cruds.budget.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.budget.fields.budget') }}
                            @include('components.table.sort', ['field' => 'budget.name'])
                        </th>
                        <th>
                            {{ trans('cruds.budget.fields.br') }}
                            @include('components.table.sort', ['field' => 'br.name'])
                        </th>
                        <th>
                            {{ trans('cruds.budget.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                            {{ trans('cruds.budget.fields.fiscal_year') }}
                            @include('components.table.sort', ['field' => 'fiscal_year.date'])
                        </th>
                        <th>
                            {{ trans('cruds.budget.fields.amount') }}
                            @include('components.table.sort', ['field' => 'amount'])
                        </th>
                        <th>
                            {{ trans('cruds.budget.fields.expense_amount') }}
                            @include('components.table.sort', ['field' => 'expense_amount'])
                        </th>
                        <th>
                            {{ trans('cruds.budget.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($budgets as $budget)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $budget->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $budget->id }}
                            </td>
                            <td>
                                @if($budget->budget)
                                    <span class="badge badge-relationship">{{ $budget->budget->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($budget->br)
                                    <span class="badge badge-relationship">{{ $budget->br->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($budget->user)
                                    <span class="badge badge-relationship">{{ $budget->user->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($budget->fiscalYear)
                                    <span class="badge badge-relationship">{{ $budget->fiscalYear->date ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $budget->amount }}
                            </td>
                            <td>
                                {{ $budget->expense_amount }}
                            </td>
                            <td>
                                {{ $budget->status_label }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('budget_show')
                                        <a class="btn btn-sm  mr-2" href="{{ route('admin.budgets.show', $budget) }}">
                                            <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                                        </a>
                                    @endcan
                                    @can('budget_edit')
                                        <a class="btn btn-sm mr-2" href="{{ route('admin.budgets.edit', $budget) }}">
                                            <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                                        </a>
                                    @endcan
                                    @can('budget_delete')
                                        <button class="btn btn-sm mr-2" type="button" wire:click="deleteConfirm( {{ $budget->id }})" wire:loading.attr="disabled">
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
            {{ $budgets->links() }}
        </div>
    </div>
</div>

@push('scripts')
  <x-delete />
    <x-deleteAll />
@endpush