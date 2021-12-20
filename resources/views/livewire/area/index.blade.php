<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('area_delete')
                <button class="btn btn-sm ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="deleteAllConfirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    <i class="far fa-trash-alt text-danger" title=" {{ __('Delete Selected') }}"></i>
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Area" format="csv" />
                <livewire:excel-export model="Area" format="xlsx" />
                <livewire:excel-export model="Area" format="pdf" />
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
                            {{ trans('cruds.area.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.area.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.area.fields.city') }}
                            @include('components.table.sort', ['field' => 'city.name'])
                        </th>
                        <th>
                            {{ trans('cruds.area.fields.country') }}
                            @include('components.table.sort', ['field' => 'country.name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($areas as $area)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $area->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $area->id }}
                            </td>
                            <td>
                                {{ $area->name }}
                            </td>
                            <td>
                                @if($area->city)
                                    <span class="badge badge-relationship">{{ $area->city->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($area->country)
                                    <span class="badge badge-relationship">{{ $area->country->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('area_show')
                                        <a class="btn btn-sm  mr-2" href="{{ route('admin.areas.show', $area) }}">
                                            <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                                        </a>
                                    @endcan
                                    @can('area_edit')
                                        <a class="btn btn-sm mr-2" href="{{ route('admin.areas.edit', $area) }}">
                                            <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                                        </a>
                                    @endcan
                                    @can('area_delete')
                                        <button class="btn btn-sm mr-2" type="button" wire:click="deleteConfirm( {{ $area->id }})" wire:loading.attr="disabled">
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
            {{ $areas->links() }}
        </div>
    </div>
</div>

@push('scripts')
  <x-delete />
    <x-deleteAll />
@endpush