@extends('layouts.admin')
@section('header')
    <div class="col-sm-6">
        <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.project-departments.index') }}">
            <i class="fas fa-arrow-left"></i>
            {{ trans('global.back') }}
        </a>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">{{ trans('global.view') }}
                {{ trans('cruds.projectDepartment.title_singular') }}</li>
            <li class="breadcrumb-item"><a
                    href="{{ route('admin.project-departments.index') }}">{{ trans('cruds.projectDepartment.title_singular') }}
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
                    <a href="{{ route('admin.project-departments.edit', $projectDepartment) }}" class="btn btn-sm mr-2">
                        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    </a>
                @endcan
                <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.project-departments.index') }}">
                    <i class="fas fa-arrow-left"></i>
                    {{ trans('global.back') }}
                </a>
            </div>
@endsection