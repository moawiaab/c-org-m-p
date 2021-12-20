@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                    {{ trans('cruds.bank.title_singular') }}:
                    {{ trans('cruds.bank.fields.id') }}
                    {{ $bank->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.bank.fields.id') }}
                            </th>
                            <td>
                                {{ $bank->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bank.fields.name') }}
                            </th>
                            <td>
                                {{ $bank->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bank.fields.details') }}
                            </th>
                            <td>
                                {{ $bank->details }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bank.fields.number') }}
                            </th>
                            <td>
                                {{ $bank->number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bank.fields.amount') }}
                            </th>
                            <td>
                                {{ $bank->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bank.fields.amount_in') }}
                            </th>
                            <td>
                                {{ $bank->amount_in }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bank.fields.amount_out') }}
                            </th>
                            <td>
                                {{ $bank->amount_out }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bank.fields.status') }}
                            </th>
                            <td>
                                {{ $bank->status_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bank.fields.br') }}
                            </th>
                            <td>
                                @if($bank->br)
                                    <span class="badge badge-relationship">{{ $bank->br->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bank.fields.user') }}
                            </th>
                            <td>
                                @if($bank->user)
                                    <span class="badge badge-relationship">{{ $bank->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bank.fields.created_at') }}
                            </th>
                            <td>
                                {{ $bank->created_at }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bank.fields.updated_at') }}
                            </th>
                            <td>
                                {{ $bank->updated_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('bank_edit')
                    <a href="{{ route('admin.banks.edit', $bank) }}" class="btn btn-indigo mr-2">
                        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    </a>
                @endcan
                <a href="{{ route('admin.banks.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection