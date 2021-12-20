@extends('layouts.admin')
@section('header')
    <div class="col-sm-6">
        <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.fiscal-years.index') }}">
            <i class="fas fa-arrow-left"></i>
            {{ trans('global.back') }}
        </a>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">{{ trans('global.view') }}
                {{ trans('cruds.fiscalYear.title_singular') }}</li>
            <li class="breadcrumb-item"><a
                    href="{{ route('admin.fiscal-years.index') }}">{{ trans('cruds.fiscalYear.title_singular') }}
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
                        {{ trans('cruds.fiscalYear.fields.id') }}
                    </th>
                    <td>
                        {{ $fiscalYear->id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.fiscalYear.fields.amount') }}
                    </th>
                    <td>
                        {{ $fiscalYear->amount }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.fiscalYear.fields.status') }}
                    </th>
                    <td>
                        {{ $fiscalYear->status_label }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.fiscalYear.fields.date') }}
                    </th>
                    <td>
                        {{ $fiscalYear->date }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.fiscalYear.fields.br') }}
                    </th>
                    <td>
                        @if ($fiscalYear->br)
                            <span class="badge badge-relationship">{{ $fiscalYear->br->name ?? '' }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.fiscalYear.fields.user') }}
                    </th>
                    <td>
                        @if ($fiscalYear->user)
                            <span class="badge badge-relationship">{{ $fiscalYear->user->name ?? '' }}</span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="form-group">
        @can('fiscal_year_edit')
            <a href="{{ route('admin.fiscal-years.edit', $fiscalYear) }}" class="btn btn-sm mr-2">
                <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
            </a>
        @endcan
        <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.fiscal-years.index') }}">
            <i class="fas fa-arrow-left"></i>
            {{ trans('global.back') }}
        </a>
    </div>
@endsection
