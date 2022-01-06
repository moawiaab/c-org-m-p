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
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.project.fields.name') }}
                </th>
                <td>
                    {{ $project->name }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.project.fields.details') }}
                </th>
                <td>
                    {{ $project->details }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.project.fields.all_amount') }}
                </th>
                <td>
                    {{ $project->all_amount }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.project.fields.expense_amount') }}
                </th>
                <td>
                    {{ $project->expense_amount }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.project.fields.reserved_amount') }}
                </th>
                <td>
                    {{ $project->reserved_amount }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.project.fields.administrative_ratio') }}
                </th>
                <td>
                    {{ $project->administrative_ratio }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.project.fields.ratio') }}
                </th>
                <td>
                    {{ $project->ratio }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.project.fields.beneficiaries_number') }}
                </th>
                <td>
                    {{ $project->beneficiaries_number }}
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
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.project.fields.project_branch') }}
                </th>
                <td>
                    @if($project->projectBranch)
                    <span class="badge badge-relationship">{{ $project->projectBranch->name ?? '' }}</span>
                    @endif
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
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.project.fields.user') }}
                </th>
                <td>
                    @foreach($project->user as $key => $entry)
                    {{ trans('cruds.project.fields.user') }} : <span class="badge badge-relationship">{{ $entry->name
                        }}</span> {{ trans('cruds.project.fields.branch') }} : <span class="badge badge-relationship">{{
                        $entry->br->name }}</span> <br>
                    @endforeach
                </td>
            </tr>

            <tr>
                <th>
                    {{ trans('cruds.project.fields.phases') }}
                </th>
                <td>
                    @foreach($project->phases as $key => $entry)
                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                    @endforeach
                </td>
            </tr>

            <tr>
                <th>
                    {{ trans('cruds.project.fields.partners') }}
                </th>
                <td>
                    @foreach($project->partners as $key => $entry)
                    @if ($entry->id !== $project->branch->id) {{ trans('cruds.project.fields.partners') }} : @else {{ trans('cruds.project.fields.branch') }} : @endif
                    <span class="badge badge-relationship">{{ $entry->name }}</span> <br>
                    @endforeach
                </td>
            </tr>
            {{-- <tr>
                <th>
                    {{ trans('cruds.project.fields.branch') }}
                </th>
                <td>
                    @if($project->branch)
                    <span class="badge badge-relationship">{{ $project->branch->name ?? '' }}</span>
                    @endif
                </td>
            </tr> --}}
            <tr>
                <th>
                    {{ trans('cruds.project.fields.country') }}
                </th>
                <td>
                    @if($project->country)
                    <span class="badge badge-relationship">{{ $project->country->name ?? '' }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.project.fields.city') }}
                </th>
                <td>
                    @if($project->city)
                    <span class="badge badge-relationship">{{ $project->city->name ?? '' }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.project.fields.area') }}
                </th>
                <td>
                    @if($project->area)
                    <span class="badge badge-relationship">{{ $project->area->name ?? '' }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.project.fields.status') }}
                </th>
                <td>
                    {{ $project->status_label }}
                </td>
            </tr>
        </tbody>
    </table>
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