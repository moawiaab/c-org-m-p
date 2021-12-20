<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('project_stage_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    <i class="far fa-trash-alt text-danger" title=" {{ __('Delete Selected') }}"></i>
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="ProjectStage" format="csv" />
                <livewire:excel-export model="ProjectStage" format="xlsx" />
                <livewire:excel-export model="ProjectStage" format="pdf" />
            @endif


            @can('project_stage_create')
                <x-csv-import route="{{ route('admin.project-stages.csv.store') }}" />
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
                            {{ trans('cruds.projectStage.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.projectStage.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.projectStage.fields.details') }}
                            @include('components.table.sort', ['field' => 'details'])
                        </th>
                        <th>
                            {{ trans('cruds.projectStage.fields.amount') }}
                            @include('components.table.sort', ['field' => 'amount'])
                        </th>
                        <th>
                            {{ trans('cruds.projectStage.fields.start_date') }}
                            @include('components.table.sort', ['field' => 'start_date'])
                        </th>
                        <th>
                            {{ trans('cruds.projectStage.fields.end_date') }}
                            @include('components.table.sort', ['field' => 'end_date'])
                        </th>
                        <th>
                            {{ trans('cruds.projectStage.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                            {{ trans('cruds.projectStage.fields.project') }}
                            @include('components.table.sort', ['field' => 'project.name'])
                        </th>
                        <th>
                            {{ trans('cruds.projectStage.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.projectStage.fields.br') }}
                            @include('components.table.sort', ['field' => 'br.name'])
                        </th>
                        <th>
                            {{ trans('cruds.projectStage.fields.user_created') }}
                            @include('components.table.sort', ['field' => 'user_created.name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projectStages as $projectStage)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $projectStage->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $projectStage->id }}
                            </td>
                            <td>
                                {{ $projectStage->name }}
                            </td>
                            <td>
                                {{ $projectStage->details }}
                            </td>
                            <td>
                                {{ $projectStage->amount }}
                            </td>
                            <td>
                                {{ $projectStage->start_date }}
                            </td>
                            <td>
                                {{ $projectStage->end_date }}
                            </td>
                            <td>
                                {{ $projectStage->status_label }}
                            </td>
                            <td>
                                @if($projectStage->project)
                                    <span class="badge badge-relationship">{{ $projectStage->project->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @foreach($projectStage->user as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if($projectStage->br)
                                    <span class="badge badge-relationship">{{ $projectStage->br->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($projectStage->userCreated)
                                    <span class="badge badge-relationship">{{ $projectStage->userCreated->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('project_stage_show')
                                        <a class="btn btn-sm  mr-2" href="{{ route('admin.project-stages.show', $projectStage) }}">
                                            <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                                        </a>
                                    @endcan
                                    @can('project_stage_edit')
                                        <a class="btn btn-sm mr-2" href="{{ route('admin.project-stages.edit', $projectStage) }}">
                                            <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                                        </a>
                                    @endcan
                                    @can('project_stage_delete')
                                        <button class="btn btn-sm mr-2" type="button" wire:click="confirm('delete', {{ $projectStage->id }})" wire:loading.attr="disabled">
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
            {{ $projectStages->links() }}
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