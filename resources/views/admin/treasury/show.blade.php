@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                    {{ trans('cruds.treasury.title_singular') }}:
                    {{ trans('cruds.treasury.fields.id') }}
                    {{ $treasury->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
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
                    <a href="{{ route('admin.treasuries.edit', $treasury) }}" class="btn btn-indigo mr-2">
                        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    </a>
                @endcan
                <a href="{{ route('admin.treasuries.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection