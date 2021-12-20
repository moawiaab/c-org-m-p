<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('project_branch_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    <i class="far fa-trash-alt text-danger" title=" {{ __('Delete Selected') }}"></i>
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="ProjectBranch" format="csv" />
                <livewire:excel-export model="ProjectBranch" format="xlsx" />
                <livewire:excel-export model="ProjectBranch" format="pdf" />
            @endif




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
                            {{ trans('cruds.projectBranch.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.projectBranch.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.projectBranch.fields.details') }}
                            @include('components.table.sort', ['field' => 'details'])
                        </th>
                        <th>
                            {{ trans('cruds.projectBranch.fields.proj') }}
                            @include('components.table.sort', ['field' => 'proj.name'])
                        </th>
                        <th>
                            {{ trans('cruds.projectBranch.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                            {{ trans('cruds.projectBranch.fields.br') }}
                            @include('components.table.sort', ['field' => 'br.name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projectBranches as $projectBranch)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $projectBranch->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $projectBranch->id }}
                            </td>
                            <td>
                                {{ $projectBranch->name }}
                            </td>
                            <td>
                                {{ $projectBranch->details }}
                            </td>
                            <td>
                                @if($projectBranch->proj)
                                    <span class="badge badge-relationship">{{ $projectBranch->proj->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($projectBranch->user)
                                    <span class="badge badge-relationship">{{ $projectBranch->user->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($projectBranch->br)
                                    <span class="badge badge-relationship">{{ $projectBranch->br->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('project_branch_show')
                                        <a class="btn btn-sm  mr-2" href="{{ route('admin.project-branches.show', $projectBranch) }}">
                                            <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                                        </a>
                                    @endcan
                                    @can('project_branch_edit')
                                        <a class="btn btn-sm mr-2" href="{{ route('admin.project-branches.edit', $projectBranch) }}">
                                            <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                                        </a>
                                    @endcan
                                    @can('project_branch_delete')
                                        <button class="btn btn-sm mr-2" type="button" wire:click="confirm('delete', {{ $projectBranch->id }})" wire:loading.attr="disabled">
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
            {{ $projectBranches->links() }}
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