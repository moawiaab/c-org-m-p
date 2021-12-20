@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                    {{ trans('cruds.project.title_singular') }}:
                    {{ trans('cruds.project.fields.id') }}
                    {{ $project->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
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
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.project.fields.branch') }}
                            </th>
                            <td>
                                @if($project->branch)
                                    <span class="badge badge-relationship">{{ $project->branch->name ?? '' }}</span>
                                @endif
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
                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-indigo mr-2">
                        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    </a>
                @endcan
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection