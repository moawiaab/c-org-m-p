@extends('layouts.admin')
@section('header')
    <div class="col-sm-6">
        <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.roles.index') }}">
            <i class="fas fa-arrow-left"></i>
            {{ trans('global.back') }}
        </a>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">{{ trans('global.edit') }}
                {{ trans('cruds.role.title_singular') }} {{ trans('cruds.role.fields.id') }}
                {{ $role->id }}</li>
            <li class="breadcrumb-item"><a
                    href="{{ route('admin.roles.index') }}">{{ trans('cruds.role.title_singular') }}
                    {{ trans('global.list') }}</a></li>
            <li class="breadcrumb-item active"><a href="/"> {{ trans('global.dashboard') }}</a></li>
        </ol>
    </div>
@endsection
@section('content')
    @livewire('role.edit', [$role])
@endsection
