@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                    {{ trans('cruds.bankAmount.title_singular') }}:
                    {{ trans('cruds.bankAmount.fields.id') }}
                    {{ $bankAmount->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
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
                    <a href="{{ route('admin.bank-amounts.edit', $bankAmount) }}" class="btn btn-indigo mr-2">
                        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    </a>
                @endcan
                <a href="{{ route('admin.bank-amounts.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection