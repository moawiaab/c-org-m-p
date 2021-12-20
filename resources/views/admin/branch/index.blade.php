@extends('layouts.admin')
@section('header')
    <div class="col-sm-6">
        @can('branch_create')
            <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.branches.create') }}">
                <i class="fas fa-plus-circle"></i> {{ trans('global.add') }}
                {{ trans('cruds.branch.title_singular') }}
            </a>
        @endcan
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">{{ trans('cruds.branch.title_singular') }}
                {{ trans('global.list') }}</li>
            <li class="breadcrumb-item active"><a href="/"> {{ trans('global.dashboard') }}</a></li>
        </ol>
    </div>
@endsection
@section('content')
    @livewire('branch.index')
@endsection
