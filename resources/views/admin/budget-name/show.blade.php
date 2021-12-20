@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                    {{ trans('cruds.budgetName.title_singular') }}:
                    {{ trans('cruds.budgetName.fields.id') }}
                    {{ $budgetName->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.budgetName.fields.id') }}
                            </th>
                            <td>
                                {{ $budgetName->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.budgetName.fields.name') }}
                            </th>
                            <td>
                                {{ $budgetName->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.budgetName.fields.details') }}
                            </th>
                            <td>
                                {{ $budgetName->details }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.budgetName.fields.type') }}
                            </th>
                            <td>
                                {{ $budgetName->type_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.budgetName.fields.status') }}
                            </th>
                            <td>
                                {{ $budgetName->status_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.budgetName.fields.br') }}
                            </th>
                            <td>
                                @if($budgetName->br)
                                    <span class="badge badge-relationship">{{ $budgetName->br->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.budgetName.fields.user') }}
                            </th>
                            <td>
                                @if($budgetName->user)
                                    <span class="badge badge-relationship">{{ $budgetName->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('budget_name_edit')
                    <a href="{{ route('admin.budget-names.edit', $budgetName) }}" class="btn btn-indigo mr-2">
                        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    </a>
                @endcan
                <a href="{{ route('admin.budget-names.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection