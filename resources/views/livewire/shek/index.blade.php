<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('shek_delete')
                <button class="btn btn-sm ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="deleteAllConfirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    <i class="far fa-trash-alt text-danger" title=" {{ __('Delete Selected') }}"></i>
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Shek" format="csv" />
                <livewire:excel-export model="Shek" format="xlsx" />
                <livewire:excel-export model="Shek" format="pdf" />
            @endif


            @can('shek_create')
                <x-csv-import route="{{ route('admin.sheks.csv.store') }}" />
            @endcan

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
                            {{ trans('cruds.shek.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.shek.fields.expense') }}
                            @include('components.table.sort', ['field' => 'expense.amount'])
                        </th>
                        <th>
                            {{ trans('cruds.shek.fields.project') }}
                            @include('components.table.sort', ['field' => 'project.name'])
                        </th>
                        <th>
                            {{ trans('cruds.shek.fields.type') }}
                            @include('components.table.sort', ['field' => 'type'])
                        </th>
                        <th>
                            {{ trans('cruds.shek.fields.amount') }}
                            @include('components.table.sort', ['field' => 'amount'])
                        </th>
                        <th>
                            {{ trans('cruds.shek.fields.bank') }}
                            @include('components.table.sort', ['field' => 'bank.name'])
                        </th>
                        <th>
                            {{ trans('cruds.shek.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                            {{ trans('cruds.shek.fields.br') }}
                            @include('components.table.sort', ['field' => 'br.name'])
                        </th>
                        <th>
                            {{ trans('cruds.shek.fields.shek_number') }}
                            @include('components.table.sort', ['field' => 'shek_number'])
                        </th>
                        <th>
                            {{ trans('cruds.shek.fields.entry_date') }}
                            @include('components.table.sort', ['field' => 'entry_date'])
                        </th>
                        <th>
                            {{ trans('cruds.shek.fields.amount_text') }}
                            @include('components.table.sort', ['field' => 'amount_text'])
                        </th>
                        <th>
                            {{ trans('cruds.shek.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sheks as $shek)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $shek->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $shek->id }}
                            </td>
                            <td>
                                @if($shek->expense)
                                    <span class="badge badge-relationship">{{ $shek->expense->amount ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($shek->project)
                                    <span class="badge badge-relationship">{{ $shek->project->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $shek->type_label }}
                            </td>
                            <td>
                                {{ $shek->amount }}
                            </td>
                            <td>
                                @if($shek->bank)
                                    <span class="badge badge-relationship">{{ $shek->bank->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($shek->user)
                                    <span class="badge badge-relationship">{{ $shek->user->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($shek->br)
                                    <span class="badge badge-relationship">{{ $shek->br->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $shek->shek_number }}
                            </td>
                            <td>
                                {{ $shek->entry_date }}
                            </td>
                            <td>
                                {{ $shek->amount_text }}
                            </td>
                            <td>
                                {{ $shek->status_label }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('shek_show')
                                        <a class="btn btn-sm  mr-2" href="{{ route('admin.sheks.show', $shek) }}">
                                            <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                                        </a>
                                    @endcan
                                    @can('shek_edit')
                                        <a class="btn btn-sm mr-2" href="{{ route('admin.sheks.edit', $shek) }}">
                                            <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                                        </a>
                                    @endcan
                                    @can('shek_delete')
                                        <button class="btn btn-sm mr-2" type="button" wire:click="deleteConfirm( {{ $shek->id }})" wire:loading.attr="disabled">
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
            {{ $sheks->links() }}
        </div>
    </div>
</div>

@push('scripts')
  <x-delete />
    <x-deleteAll />
@endpush