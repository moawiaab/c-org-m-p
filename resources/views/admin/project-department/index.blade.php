@extends('layouts.admin')
@section('header')
    <div class="col-sm-6">
        @can('project_department_create')
            <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.project-departments.create') }}">
                <i class="fas fa-plus-circle"></i> {{ trans('global.add') }}
                {{ trans('cruds.projectDepartment.title_singular') }}
            </a>
        @endcan
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">{{ trans('cruds.projectDepartment.title_singular') }}
                {{ trans('global.list') }}</li>
            <li class="breadcrumb-item active"><a href="/"> {{ trans('global.dashboard') }}</a></li>
        </ol>
    </div>
@endsection
@section('content')
    @livewire('project-department.index')
@endsection
