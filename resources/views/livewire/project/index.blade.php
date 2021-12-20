<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('project_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    <i class="far fa-trash-alt text-danger" title=" {{ __('Delete Selected') }}"></i>
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Project" format="csv" />
                <livewire:excel-export model="Project" format="xlsx" />
                <livewire:excel-export model="Project" format="pdf" />
            @endif


            @can('project_create')
                <x-csv-import route="{{ route('admin.projects.csv.store') }}" />
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
                            {{ trans('cruds.project.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.all_amount') }}
                            @include('components.table.sort', ['field' => 'all_amount'])
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.expense_amount') }}
                            @include('components.table.sort', ['field' => 'expense_amount'])
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.reserved_amount') }}
                            @include('components.table.sort', ['field' => 'reserved_amount'])
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.country') }}
                            @include('components.table.sort', ['field' => 'country.name'])
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $project->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $project->id }}
                            </td>
                            <td>
                                {{ $project->name }}
                            </td>
                            <td>
                                {{ $project->all_amount }}
                            </td>
                            <td>
                                {{ $project->expense_amount }}
                            </td>
                            <td>
                                {{ $project->reserved_amount }}
                            </td>
                            <td>
                                @foreach($project->user as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if($project->country)
                                    <span class="badge badge-relationship">{{ $project->country->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $project->status_label }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('project_show')
                                        <a class="btn btn-sm  mr-2" href="{{ route('admin.projects.show', $project) }}">
                                            <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                                        </a>
                                    @endcan
                                    @can('project_edit')
                                        <a class="btn btn-sm mr-2" href="{{ route('admin.projects.edit', $project) }}">
                                            <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                                        </a>
                                    @endcan
                                    @can('project_delete')
                                        <button class="btn btn-sm mr-2" type="button" wire:click="confirm('delete', {{ $project->id }})" wire:loading.attr="disabled">
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
            {{ $projects->links() }}
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