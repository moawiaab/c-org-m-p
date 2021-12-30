@extends('layouts.admin')
@section('header')
<div class="col-sm-6">
    <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.treasuries.index') }}">
        <i class="fas fa-arrow-left"></i>
        {{ trans('global.back') }}
    </a>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">{{ trans('global.edit') }}
            {{ trans('cruds.treasury.title_singular') }} {{ trans('cruds.treasury.fields.id') }}
            {{ $treasury->id }}</li>
        <li class="breadcrumb-item"><a href="{{ route('admin.treasuries.index') }}">{{
                trans('cruds.treasury.title_singular') }}
                {{ trans('global.list') }}</a></li>
        <li class="breadcrumb-item active"><a href="/"> {{ trans('global.dashboard') }}</a></li>
    </ol>
</div>
@endsection
@section('content')
@livewire('treasury.edit', [$treasury])
@endsection