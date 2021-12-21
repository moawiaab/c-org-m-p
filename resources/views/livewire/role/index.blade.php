<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach ($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('role_delete')
                <button class="btn btn-sm ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button"
                    wire:click="deleteAllConfirm('deleteSelected')" wire:loading.attr="disabled"
                    {{ $this->selectedCount ? '' : 'disabled' }}>
                    <i class="far fa-trash-alt text-danger" title=" {{ __('Delete Selected') }}"></i>
                </button>
            @endcan

            @if (file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Role" format="csv" />
                <livewire:excel-export model="Role" format="xlsx" />
                <livewire:excel-export model="Role" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
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
                            {{ trans('cruds.role.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.role.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                            {{ trans('cruds.role.fields.permissions') }}
                        </th>
                        @if (auth()->user()->br_id == 1)
                            <th>
                                {{ trans('cruds.role.fields.br') }}
                                @include('components.table.sort', ['field' => 'br.name'])
                            </th>
                        @endif
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $role->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $role->id }}
                            </td>
                            <td>
                                {{ $role->title }}
                            </td>
                            <td>
                                @foreach ($role->permissions as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                            @if (auth()->user()->br_id == 1)
                                <td>
                                    @if ($role->br)
                                        <span class="badge badge-relationship">{{ $role->br->name ?? '' }}</span>
                                    @endif
                                </td>
                            @endif
                            <td>
                                <div class="flex justify-end">
                                    @can('role_show')
                                        <a class="btn btn-sm  mr-2" href="{{ route('admin.roles.show', $role) }}">
                                            <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                                        </a>
                                    @endcan
                                    @can('role_edit')
                                        <a class="btn btn-sm mr-2" href="{{ route('admin.roles.edit', $role) }}">
                                            <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                                        </a>
                                    @endcan
                                    @can('role_delete')
                                        <button class="btn btn-sm mr-2" type="button"
                                            wire:click="deleteConfirm( {{ $role->id }})" wire:loading.attr="disabled">
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
            {{ $roles->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <x-delete />
    <x-deleteAll />
@endpush
