<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('treasury_delete')
                <button class="btn btn-sm ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="deleteAllConfirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    <i class="far fa-trash-alt text-danger" title=" {{ __('Delete Selected') }}"></i>
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Treasury" format="csv" />
                <livewire:excel-export model="Treasury" format="xlsx" />
                <livewire:excel-export model="Treasury" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
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
                            {{ trans('cruds.treasury.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.treasury.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.treasury.fields.amount') }}
                            @include('components.table.sort', ['field' => 'amount'])
                        </th>
                        <th>
                            {{ trans('cruds.treasury.fields.incoming_amount') }}
                            @include('components.table.sort', ['field' => 'incoming_amount'])
                        </th>
                        <th>
                            {{ trans('cruds.treasury.fields.expense_amount') }}
                            @include('components.table.sort', ['field' => 'expense_amount'])
                        </th>
                        <th>
                            {{ trans('cruds.treasury.fields.br') }}
                            @include('components.table.sort', ['field' => 'br.name'])
                        </th>
                        <th>
                            {{ trans('cruds.treasury.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($treasuries as $treasury)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $treasury->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $treasury->id }}
                            </td>
                            <td>
                                {{ $treasury->name }}
                            </td>
                            <td>
                                {{ $treasury->amount }}
                            </td>
                            <td>
                                {{ $treasury->incoming_amount }}
                            </td>
                            <td>
                                {{ $treasury->expense_amount }}
                            </td>
                            <td>
                                @if($treasury->br)
                                    <span class="badge badge-relationship">{{ $treasury->br->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($treasury->user)
                                    <span class="badge badge-relationship">{{ $treasury->user->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('treasury_show')
                                        <a class="btn btn-sm  mr-2" href="{{ route('admin.treasuries.show', $treasury) }}">
                                            <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                                        </a>
                                    @endcan
                                    @can('treasury_edit')
                                        <a class="btn btn-sm mr-2" href="{{ route('admin.treasuries.edit', $treasury) }}">
                                            <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                                        </a>
                                    @endcan
                                    @can('treasury_delete')
                                        <button class="btn btn-sm mr-2" type="button" wire:click="deleteConfirm( {{ $treasury->id }})" wire:loading.attr="disabled">
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
            {{ $treasuries->links() }}
        </div>
    </div>
</div>

@push('scripts')
  <x-delete />
    <x-deleteAll />
@endpush