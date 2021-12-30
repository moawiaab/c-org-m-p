@extends('layouts.admin')
@section('header')
<div class="col-sm-6">
    <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.bank-amounts.index') }}">
        <i class="fas fa-arrow-left"></i>
        {{ trans('global.back') }}
    </a>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">{{ trans('global.view') }}
            {{ trans('cruds.bankAmount.title_singular') }}</li>
        <li class="breadcrumb-item"><a href="{{ route('admin.bank-amounts.index') }}">{{
                trans('cruds.bankAmount.title_singular') }}
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
                    {{ trans('cruds.bankAmount.fields.id') }}
                </th>
                <td>
                    {{ $bankAmount->id }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bankAmount.fields.bank_from') }}
                </th>
                <td>
                    @if($bankAmount->bankFrom)
                    <span class="badge badge-relationship">{{ $bankAmount->bankFrom->name ?? '' }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bankAmount.fields.bank_to') }}
                </th>
                <td>
                    @if($bankAmount->bankTo)
                    <span class="badge badge-relationship">{{ $bankAmount->bankTo->name ?? '' }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bankAmount.fields.amount_in') }}
                </th>
                <td>
                    {{ $bankAmount->amount_in }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bankAmount.fields.amount_out') }}
                </th>
                <td>
                    {{ $bankAmount->amount_out }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bankAmount.fields.amount') }}
                </th>
                <td>
                    {{ $bankAmount->amount }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bankAmount.fields.details') }}
                </th>
                <td>
                    {{ $bankAmount->details }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bankAmount.fields.br') }}
                </th>
                <td>
                    @if($bankAmount->br)
                    <span class="badge badge-relationship">{{ $bankAmount->br->name ?? '' }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bankAmount.fields.user') }}
                </th>
                <td>
                    @if($bankAmount->user)
                    <span class="badge badge-relationship">{{ $bankAmount->user->name ?? '' }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bankAmount.fields.status') }}
                </th>
                <td>
                    {{ $bankAmount->status_label }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bankAmount.fields.created_at') }}
                </th>
                <td>
                    {{ $bankAmount->created_at }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="form-group">
    @can('bank_amount_edit')
    <a href="{{ route('admin.bank-amounts.edit', $bankAmount) }}" class="btn btn-sm mr-2">
        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
    </a>
    @endcan
    <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.bank-amounts.index') }}">
        <i class="fas fa-arrow-left"></i>
        {{ trans('global.back') }}
    </a>
</div>

@endsection