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
        <li class="breadcrumb-item active">{{ trans('global.view') }}
            {{ trans('cruds.treasury.title_singular') }}</li>
        <li class="breadcrumb-item"><a href="{{ route('admin.treasuries.index') }}">{{
                trans('cruds.treasury.title_singular') }}
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
                    {{ trans('cruds.treasury.fields.id') }}
                </th>
                <td>
                    {{ $treasury->id }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.treasury.fields.name') }}
                </th>
                <td>
                    {{ $treasury->name }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.treasury.fields.amount') }}
                </th>
                <td>
                    {{ $treasury->amount }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.treasury.fields.incoming_amount') }}
                </th>
                <td>
                    {{ $treasury->incoming_amount }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.treasury.fields.expense_amount') }}
                </th>
                <td>
                    {{ $treasury->expense_amount }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.treasury.fields.br') }}
                </th>
                <td>
                    @if($treasury->br)
                    <span class="badge badge-relationship">{{ $treasury->br->name ?? '' }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.treasury.fields.user') }}
                </th>
                <td>
                    @if($treasury->user)
                    <span class="badge badge-relationship">{{ $treasury->user->name ?? '' }}</span>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="form-group">
    @can('treasury_edit')
    <a href="{{ route('admin.treasuries.edit', $treasury) }}" class="btn btn-sm mr-2">
        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
    </a>
    @endcan
    <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.treasuries.index') }}">
        <i class="fas fa-arrow-left"></i>
        {{ trans('global.back') }}
    </a>
</div>

@endsection