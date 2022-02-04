<div>
    <div class="card-controls sm:flex row">
        <div class="w-full sm:w-1/2 col-md-6">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach ($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('branch_delete')
                <button class="btn btn-sm ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button"
                    wire:click="deleteAllConfirm('deleteSelected')" wire:loading.attr="disabled"
                    {{ $this->selectedCount ? '' : 'disabled' }}>
                    <i class="far fa-trash-alt text-danger" title=" {{ __('Delete Selected') }}"></i>
                </button>
            @endcan

            @if (file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Branch" format="csv" />
                <livewire:excel-export model="Branch" format="xlsx" />
                <livewire:excel-export model="Branch" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 col-md-6 sm:text-right">
            <input type="text" wire:model.debounce.300ms="search" class="inline-block form-control"
                placeholder="{{ trans('global.search') }}" />
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
                            {{ trans('cruds.branch.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.branch.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.branch.fields.address') }}
                            @include('components.table.sort', ['field' => 'address'])
                        </th>
                        <th>
                            {{ trans('cruds.branch.fields.email') }}
                            @include('components.table.sort', ['field' => 'email'])
                        </th>
                        <th>
                            {{ trans('cruds.branch.fields.phone') }}
                            @include('components.table.sort', ['field' => 'phone'])
                        </th>
                        <th>
                            {{ trans('cruds.branch.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                            {{ trans('cruds.branch.fields.logo') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($branches as $branch)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $branch->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $branch->id }}
                            </td>
                            <td>
                                {{ $branch->name }}
                            </td>
                            <td>
                                {{ $branch->address }}
                            </td>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $branch->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $branch->email }}
                                </a>
                            </td>
                            <td>
                                {{ $branch->phone }}
                            </td>
                            <td>
                                {{ $branch->status_label }}
                            </td>
                            <td>
                                @foreach ($branch->logo as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}"
                                            title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('branch_show')
                                        <a class="btn btn-sm  mr-2" href="{{ route('admin.branches.show', $branch) }}">
                                            <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                                        </a>
                                    @endcan
                                    @can('branch_edit')
                                        <a class="btn btn-sm mr-2" href="{{ route('admin.branches.edit', $branch) }}">
                                            <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                                        </a>
                                    @endcan
                                    @can('branch_delete')
                                        <button class="btn btn-sm mr-2" type="button"
                                            wire:click="deleteConfirm( {{ $branch->id }})"
                                            wire:loading.attr="disabled">
                                            <i class="far fa-trash-alt text-danger"
                                                title="{{ trans('global.delete') }}"></i>
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
            @if ($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $branches->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <x-delete />
    <x-deleteAll />
@endpush
