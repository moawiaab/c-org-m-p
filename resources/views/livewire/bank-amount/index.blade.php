<div>
    <div class="card-controls sm:flex row">
        <div class="w-full sm:w-1/2 col-md-6">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('bank_amount_delete')
                <button class="btn btn-sm ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="deleteAllConfirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    <i class="far fa-trash-alt text-danger" title=" {{ __('Delete Selected') }}"></i>
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="BankAmount" format="csv" />
                <livewire:excel-export model="BankAmount" format="xlsx" />
                <livewire:excel-export model="BankAmount" format="pdf" />
            @endif


            @can('bank_amount_create')
                <x-csv-import route="{{ route('admin.bank-amounts.csv.store') }}" />
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
                            {{ trans('cruds.bankAmount.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.bankAmount.fields.bank_from') }}
                            @include('components.table.sort', ['field' => 'bank_from.name'])
                        </th>
                        <th>
                            {{ trans('cruds.bankAmount.fields.bank_to') }}
                            @include('components.table.sort', ['field' => 'bank_to.name'])
                        </th>
                        <th>
                            {{ trans('cruds.bankAmount.fields.amount_in') }}
                            @include('components.table.sort', ['field' => 'amount_in'])
                        </th>
                        <th>
                            {{ trans('cruds.bankAmount.fields.amount_out') }}
                            @include('components.table.sort', ['field' => 'amount_out'])
                        </th>
                        <th>
                            {{ trans('cruds.bankAmount.fields.amount') }}
                            @include('components.table.sort', ['field' => 'amount'])
                        </th>
                        <th>
                            {{ trans('cruds.bankAmount.fields.details') }}
                            @include('components.table.sort', ['field' => 'details'])
                        </th>
                        <th>
                            {{ trans('cruds.bankAmount.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                            {{ trans('cruds.bankAmount.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bankAmounts as $bankAmount)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $bankAmount->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $bankAmount->id }}
                            </td>
                            <td>
                                @if($bankAmount->bankFrom)
                                    <span class="badge badge-relationship">{{ $bankAmount->bankFrom->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($bankAmount->bankTo)
                                    <span class="badge badge-relationship">{{ $bankAmount->bankTo->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $bankAmount->amount_in }}
                            </td>
                            <td>
                                {{ $bankAmount->amount_out }}
                            </td>
                            <td>
                                {{ $bankAmount->amount }}
                            </td>
                            <td>
                                {{ $bankAmount->details }}
                            </td>
                            <td>
                                @if($bankAmount->user)
                                    <span class="badge badge-relationship">{{ $bankAmount->user->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $bankAmount->status_label }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('bank_amount_show')
                                        <a class="btn btn-sm  mr-2" href="{{ route('admin.bank-amounts.show', $bankAmount) }}">
                                            <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                                        </a>
                                    @endcan
                                    @can('bank_amount_edit')
                                        <a class="btn btn-sm mr-2" href="{{ route('admin.bank-amounts.edit', $bankAmount) }}">
                                            <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                                        </a>
                                    @endcan
                                    @can('bank_amount_delete')
                                        <button class="btn btn-sm mr-2" type="button" wire:click="deleteConfirm( {{ $bankAmount->id }})" wire:loading.attr="disabled">
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
            {{ $bankAmounts->links() }}
        </div>
    </div>
</div>

@push('scripts')
  <x-delete />
    <x-deleteAll />
@endpush