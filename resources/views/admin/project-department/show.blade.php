@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                    {{ trans('cruds.projectDepartment.title_singular') }}:
                    {{ trans('cruds.projectDepartment.fields.id') }}
                    {{ $projectDepartment->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.projectDepartment.fields.id') }}
                            </th>
                            <td>
                                {{ $projectDepartment->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectDepartment.fields.name') }}
                            </th>
                            <td>
                                {{ $projectDepartment->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectDepartment.fields.details') }}
                            </th>
                            <td>
                                {{ $projectDepartment->details }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectDepartment.fields.user') }}
                            </th>
                            <td>
                                @if($projectDepartment->user)
                                    <span class="badge badge-relationship">{{ $projectDepartment->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectDepartment.fields.br') }}
                            </th>
                            <td>
                                @if($projectDepartment->br)
                                    <span class="badge badge-relationship">{{ $projectDepartment->br->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('project_department_edit')
                    <a href="{{ route('admin.project-departments.edit', $projectDepartment) }}" class="btn btn-indigo mr-2">
                        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    </a>
                @endcan
                <a href="{{ route('admin.project-departments.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection