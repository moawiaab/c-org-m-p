@extends('layouts.admin')
@section('header')
    <div class="col-sm-6">
        @can('bank_amount_create')
            <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.bank-amounts.create') }}">
                <i class="fas fa-plus-circle"></i> {{ trans('global.add') }}
                {{ trans('cruds.bankAmount.title_singular') }}
            </a>
        @endcan
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">{{ trans('cruds.bankAmount.title_singular') }}
                {{ trans('global.list') }}</li>
            <li class="breadcrumb-item active"><a href="/"> {{ trans('global.dashboard') }}</a></li>
        </ol>
    </div>
@endsection
@section('content')
        @livewire('bank-amount.index')
@endsection