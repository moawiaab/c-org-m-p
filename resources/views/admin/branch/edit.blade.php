@extends('layouts.admin')
@section('header')
    <div class="col-sm-6">
        {{-- @can('branch_create') --}}
        <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.branches.index') }}">
            <i class="fas fa-arrow-left"></i>
            {{ trans('global.back') }}
        </a>
        {{-- @endcan --}}
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">{{ trans('global.edit') }}
                {{ trans('cruds.branch.title_singular') }} {{ trans('cruds.branch.fields.id') }}
                {{ $branch->id }}</li>
            <li class="breadcrumb-item"><a
                    href="{{ route('admin.branches.index') }}">{{ trans('cruds.branch.title_singular') }}
                    {{ trans('global.list') }}</a></li>
            <li class="breadcrumb-item active"><a href="/"> {{ trans('global.dashboard') }}</a></li>
        </ol>
    </div>
@endsection
@section('content')
    @livewire('branch.edit', [$branch])
@endsection
