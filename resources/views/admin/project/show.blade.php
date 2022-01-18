@extends('layouts.admin')
@section('header')
<div class="col-sm-6">
    <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.projects.index') }}">
        <i class="fas fa-arrow-left"></i>
        {{ trans('global.back') }}
    </a>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">{{ trans('global.view') }}
            {{ trans('cruds.project.title_singular') }}</li>
        <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">{{
                trans('cruds.project.title_singular') }}
                {{ trans('global.list') }}</a></li>
        <li class="breadcrumb-item active"><a href="/"> {{ trans('global.dashboard') }}</a></li>
    </ol>
</div>
@endsection
@section('content')
<h4>{{ trans('cruds.project.title_singular') }} {{ trans('cruds.project.fields.details') }}</h4>
<div class="pt-3">
    <table class="table table-view">
        <tbody class="bg-white">
            <tr>
                <th>
                    {{ trans('cruds.project.fields.id') }}
                </th>
                <td>
                    {{ $project->id }}
                </td>

                <th>
                    {{ trans('cruds.project.fields.name') }}
                </th>
                <td colspan="2">
                    {{ $project->name }}
                </td>


                <td>
                    {{ trans('cruds.project.fields.status') }} : {{ $project->status_label }}
                </td>
            </tr>

            <tr>
                <th>
                    {{ trans('cruds.project.fields.details') }}
                </th>
                <td colspan="5">
                    {{ $project->details }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.project.fields.all_amount') }}
                </th>
                <td>
                    {{ $project->all_amount }} => {{ $project->all_amount - $project->ratio}}
                </td>


                <th>
                    {{ trans('cruds.project.fields.expense_amount') }}
                </th>
                <td>
                    {{ $project->expense_amount }}
                </td>

                <th>
                    {{ trans('cruds.project.fields.reserved_amount') }}
                </th>
                <td>
                    {{ $project->reserved_amount }}
                </td>
            </tr>

            <tr>

                <th>
                    {{ trans('cruds.project.fields.project_department') }}
                </th>
                <td>
                    @if($project->projectDepartment)
                    <span class="badge badge-relationship">{{ $project->projectDepartment->name ?? '' }}</span>
                    @endif
                </td>

                <th>
                    {{ trans('cruds.project.fields.project_branch') }}
                </th>
                <td>
                    @if($project->projectBranch)
                    <span class="badge badge-relationship">{{ $project->projectBranch->name ?? '' }}</span>
                    @endif
                </td>

                <th>
                    {{ trans('cruds.project.fields.beneficiaries_number') }}
                </th>
                <td>
                    {{ $project->beneficiaries_number }}
                </td>
            </tr>

            <tr>
                <th>
                    {{ trans('cruds.project.fields.donor') }}
                </th>
                <td>
                    @if($project->donor)
                    <span class="badge badge-relationship">{{ $project->donor->name ?? '' }}</span>
                    @endif
                </td>

                <th>
                    {{ trans('cruds.project.fields.administrative_ratio') }}
                </th>
                <td>
                    {{ $project->administrative_ratio }}%
                </td>

                <th>
                    {{ trans('cruds.project.fields.ratio') }}
                </th>
                <td>
                    {{ $project->ratio }}
                </td>
                {{-- <th>
                    {{ trans('cruds.project.fields.phases') }}
                </th>
                <td colspan="4">
                    @foreach($project->phases as $key => $entry)
                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                    @endforeach
                </td> --}}
            </tr>

            <tr>
                <th>
                    {{ trans('cruds.project.fields.partners') }}
                </th>
                <td colspan="2">
                    @foreach($project->partners as $key => $entry)
                    @if ($entry->id !== $project->branch->id) {{ trans('cruds.project.fields.partners') }} : @else
                    {{ trans('cruds.project.fields.branch') }} : @endif
                    <span class="badge badge-relationship">{{ $entry->name }}</span> <br>
                    @endforeach
                </td>

                <th>
                    {{ trans('cruds.project.fields.user') }}
                </th>
                <td colspan="2">
                    @foreach($project->user as $key => $entry)
                    {{ trans('cruds.project.fields.user') }} : <span class="badge badge-relationship">{{
                        $entry->name
                        }}</span> {{ trans('cruds.project.fields.branch') }} : <span class="badge badge-relationship">{{
                        $entry->br->name }}</span> <br>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.project.fields.country') }}
                </th>
                <td>
                    @if($project->country)
                    <span class="badge badge-relationship">{{ $project->country->name ?? '' }}</span>
                    @endif
                </td>

                <th>
                    {{ trans('cruds.project.fields.city') }}
                </th>
                <td>
                    @if($project->city)
                    <span class="badge badge-relationship">{{ $project->city->name ?? '' }}</span>
                    @endif
                </td>

                <th>
                    {{ trans('cruds.project.fields.area') }}
                </th>
                <td>
                    @if($project->area)
                    <span class="badge badge-relationship">{{ $project->area->name ?? '' }}</span>
                    @endif
                </td>
            </tr>


        </tbody>
    </table>
</div>


<h4>{{ trans('cruds.project.fields.phases') }}</h4>
<div class="row">
    <div class="col-5 col-sm-3">
        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
            @foreach($project->phases as $key => $entry)
            <a class="nav-link @if($key === 0) active @endif" id="vert-{{ $entry->id }}-tab" data-toggle="pill"
                href="#vert-{{ $entry->id }}" role="tab" aria-controls="vert-{{ $entry->id }}" aria-selected="true">
                <i class="fas fa-code-branch"></i> {{ $entry->name }}</a>
            {{-- <span class="badge badge-relationship">{{ $entry->name }}</span> --}}
         
            @endforeach
        </div>
    </div>
    <div class="col-7 col-sm-9">
        <div class="tab-content" id="vert-tabs-tabContent">
            @foreach($project->phases as $key => $entry)
            <div class="tab-pane text-left @if($key === 0) fade active show  @endif" id="vert-{{ $entry->id }}"
                role="tabpanel" aria-labelledby="vert-{{ $entry->id }}-tab">
                <button wire:click="export" type="button" class="btn btn-sm" wire:loading.attr="disabled">
                    <a class="" href="{{ route('admin.ratifications.add',[$project->id, $entry->id]) }}">
                        <i class="fas fa-hand-holding-usd text-green" title=""></i> {{ trans('global.add') }} {{ trans('cruds.ratification.title_singular') }}
                    </a>
                </button>
                @livewire('stage-detail.index', ['stage' => $entry->name, 'project' => $project->id, 'stageId' => $entry->id])
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="form-group">
    @can('project_edit')
    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm mr-2">
        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
    </a>
    @endcan
    <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.projects.index') }}">
        <i class="fas fa-arrow-left"></i>
        {{ trans('global.back') }}
    </a>
</div>
</div>
</div>
</div>
@endsection