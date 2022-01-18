<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('stage_detail_delete')
            <button
                onclick='Livewire.emit("openModal", "stage-detail.show", {{json_encode(["project" => $project, "stage" => $stage, "amount" => $amount,"status" => $status,"feeding" => $feeding, "stageId" => $stageId])}})'
                type="button" class="btn btn-sm">
                <i class="fas fa-pen-alt text-blue"></i>
            </button>
            @endcan

            {{-- <button wire:click="export" type="button" class="btn btn-sm" wire:loading.attr="disabled">
                <a class="" href="{{ route('admin.ratifications.add',[$this->project, $this->stageId]) }}">
                    <i class="fas fa-hand-holding-usd text-green" title="{{ trans('global.add') }} {{ trans('cruds.ratification.title_singular') }}"></i>
                </a>
            </button> --}}

            <button 
                onclick='Livewire.emit("openModal", "stage-detail.create", {{json_encode(["project" => $project, "stage" => $stageId])}})'
                type="button" class="btn btn-sm">
                <i class="fas fa-plus text-red"></i>
            </button>

            {{-- @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
            <livewire:excel-export model="StageDetail" format="csv" />
            <livewire:excel-export model="StageDetail" format="xlsx" />
            <livewire:excel-export model="StageDetail" format="pdf" />
            @endif --}}


            @can('stage_detail_create')
            {{--
            <x-csv-import route="{{ route('admin.stage-details.csv.store') }}" /> --}}

            @endcan

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
                            {{ trans('cruds.stageDetail.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.stageDetail.fields.stage') }}
                            @include('components.table.sort', ['field' => 'stage.name'])
                        </th>
                        <th>
                            {{ trans('cruds.stageDetail.fields.details') }}
                            @include('components.table.sort', ['field' => 'details'])
                        </th>
                        <th>
                            {{ trans('cruds.stageDetail.fields.images') }}
                        </th>
                        <th>
                            {{ trans('cruds.stageDetail.fields.project') }}
                            @include('components.table.sort', ['field' => 'project.name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stageDetails as $stageDetail)
                    <tr>
                        <td>
                            {{ $stageDetail->id }}
                        </td>
                        <td>
                            @if($stageDetail->stage)
                            <span class="badge badge-relationship">{{ $stageDetail->stage->name ?? '' }}</span>
                            @endif
                        </td>
                        <td>
                            {{ $stageDetail->details }}
                        </td>
                        <td>
                            @foreach($stageDetail->images as $key => $entry)
                            <a class="link-photo" href="{{ $entry['url'] }}">
                                <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}"
                                    title="{{ $entry['name'] }}">
                            </a>
                            @endforeach
                        </td>
                        <td>
                            @if($stageDetail->project)
                            <span class="badge badge-relationship">{{ $stageDetail->project->name ?? '' }}</span>
                            @endif
                        </td>

                        <td>
                            <div class="flex justify-end">
                                @can('stage_detail_show')
                                <a class="btn btn-sm  mr-2"
                                    href="{{ route('admin.stage-details.show', $stageDetail) }}">
                                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                                </a>
                                @endcan
                                @can('stage_detail_edit')
                                <a class="btn btn-sm mr-2" href="{{ route('admin.stage-details.edit', $stageDetail) }}">
                                    <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                                </a>
                                @endcan
                                @can('stage_detail_delete')
                                <button class="btn btn-sm mr-2" type="button"
                                    wire:click="deleteConfirm( {{ $stageDetail->id }})" wire:loading.attr="disabled">
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
            {{ $stageDetails->links() }}
        </div>
    </div>
</div>