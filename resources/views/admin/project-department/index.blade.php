@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.projectDepartment.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('project_department_create')
                    <a class="btn btn-indigo" href="{{ route('admin.project-departments.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.projectDepartment.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('project-department.index')

    </div>
</div>
@endsection