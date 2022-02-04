<div>
    <div class="card-controls sm:flex row">
        <div class="w-full sm:w-1/2 col-md-6">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('ratification_delete')
            <button class="btn btn-sm ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button"
                wire:click="deleteAllConfirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ?
                '' : 'disabled' }}>
                <i class="far fa-trash-alt text-danger" title=" {{ __('Delete Selected') }}"></i>
            </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
            <livewire:excel-export model="Ratification" format="csv" />
            <livewire:excel-export model="Ratification" format="xlsx" />
            <livewire:excel-export model="Ratification" format="pdf" />
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
                            {{ trans('cruds.ratification.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.ratification.fields.project') }}
                            @include('components.table.sort', ['field' => 'project.name'])
                        </th>
                        <th>
                            {{ trans('cruds.ratification.fields.project_stage') }}
                            @include('components.table.sort', ['field' => 'project_stage.name'])
                        </th>
                        <th>
                            {{ trans('cruds.ratification.fields.amount') }}
                            @include('components.table.sort', ['field' => 'amount'])
                        </th>

                        <th>
                            {{ trans('cruds.ratification.fields.beneficiary') }}
                            @include('components.table.sort', ['field' => 'beneficiary'])
                        </th>

                        <th>
                            {{ trans('cruds.ratification.fields.invoices') }}
                        </th>
                        <th>
                            {{ trans('cruds.ratification.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>

                        <th>
                            {{ trans('cruds.ratification.fields.stage') }}
                            @include('components.table.sort', ['field' => 'stage'])
                        </th>

                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ratifications as $ratification)
                    <tr>
                        <td>
                            <input type="checkbox" value="{{ $ratification->id }}" wire:model="selected">
                        </td>
                        <td>
                            {{ $ratification->id }}
                        </td>
                        <td>
                            @if($ratification->project)
                            <span class="badge badge-relationship">{{ $ratification->project->name ?? '' }}</span>
                            @endif
                        </td>
                        <td>
                            @if($ratification->projectStage)
                            <span class="badge badge-relationship">{{ $ratification->projectStage->name ?? '' }}</span>
                            @endif
                        </td>
                        <td>
                            {{ $ratification->amount }}
                        </td>

                        <td>
                            {{ $ratification->beneficiary }}
                        </td>

                        <td>
                            @foreach($ratification->invoices as $key => $entry)
                            <a class="link-photo" href="{{ $entry['url'] }}">
                                <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}"
                                    title="{{ $entry['name'] }}">
                            </a>
                            @endforeach
                        </td>
                        <td>
                            @if($ratification->user)
                            <span class="badge badge-relationship">{{ $ratification->user->name ?? '' }}</span>
                            @endif
                        </td>

                        <td>
                            {{ $ratification->stage_label }}
                        </td>

                        <td>
                            <div class="flex justify-end">
                                @can('ratification_show')
                                <a class="btn btn-sm  mr-2"
                                    href="{{ route('admin.ratifications.show', $ratification) }}">
                                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                                </a>
                                @endcan
                                @can('ratification_edit')

                                @if (auth()->user()->status === 1 && ($ratification->stage === 1
                                || $ratification->stage === 2)
                                || (auth()->id() === $ratification->user_id && $ratification->stage === 1)
                                || (auth()->user()->status === 2 && $ratification->stage === 1)
                                || (auth()->user()->status === 3 && $ratification->stage === 2))
                                <a class="btn btn-sm mr-2"
                                    href="{{ route('admin.ratifications.edit', $ratification) }}">
                                    <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                                </a>
                                @endif
                                @endcan
                                @can('ratification_delete')
                                @if (auth()->user()->status === 1 && ($ratification->stage === 1
                                || $ratification->stage === 2)
                                || (auth()->id() === $ratification->user_id && $ratification->stage === 1)
                                || (auth()->user()->status === 2 && $ratification->stage === 1)
                                || (auth()->user()->status === 3 && $ratification->stage === 2))
                                <button class="btn btn-sm mr-2" type="button"
                                    wire:click="deleteConfirm( {{ $ratification->id }})" wire:loading.attr="disabled">
                                    <i class="far fa-trash-alt text-danger" title="{{ trans('global.delete') }}"></i>
                                </button>
                                @endif
                                @endcan

                                @if (auth()->user()->status === 1 && ($ratification->stage === 1
                                || $ratification->stage === 2)
                                || (auth()->user()->status === 2 && $ratification->stage === 1)
                                || (auth()->user()->status === 3 && $ratification->stage === 2))
                                <button
                                    onclick='Livewire.emit("openModal", "ratification.admin", {{json_encode(["ratification" => $ratification])}})'
                                    type="button" class="btn btn-sm">
                                    <i class="fas fa-hand-holding-usd text-green" title=""></i>
                                </button>
                                @endif

                                @if ((auth()->user()->status === 1 || auth()->user()->status === 4) &&
                                $ratification->stage
                                == 3)
                                <button
                                    onclick='Livewire.emit("openModal", "ratification.admin", {{json_encode(["ratification" => $ratification])}})'
                                    type="button" class="btn btn-sm">
                                    <i class="fas fa-print text-info"></i>
                                </button>
                                @endif
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
            {{ $ratifications->links() }}
        </div>
    </div>
</div>

@push('scripts')
<x-delete />
<x-deleteAll />
@endpush