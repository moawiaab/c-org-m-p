@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                    {{ trans('cruds.fiscalYear.title_singular') }}:
                    {{ trans('cruds.fiscalYear.fields.id') }}
                    {{ $fiscalYear->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
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
                                @if($fiscalYear->br)
                                    <span class="badge badge-relationship">{{ $fiscalYear->br->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.fiscalYear.fields.user') }}
                            </th>
                            <td>
                                @if($fiscalYear->user)
                                    <span class="badge badge-relationship">{{ $fiscalYear->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('fiscal_year_edit')
                    <a href="{{ route('admin.fiscal-years.edit', $fiscalYear) }}" class="btn btn-indigo mr-2">
                        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    </a>
                @endcan
                <a href="{{ route('admin.fiscal-years.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection