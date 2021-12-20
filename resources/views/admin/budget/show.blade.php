@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                    {{ trans('cruds.budget.title_singular') }}:
                    {{ trans('cruds.budget.fields.id') }}
                    {{ $budget->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.budget.fields.id') }}
                            </th>
                            <td>
                                {{ $budget->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.budget.fields.budget') }}
                            </th>
                            <td>
                                @if($budget->budget)
                                    <span class="badge badge-relationship">{{ $budget->budget->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.budget.fields.br') }}
                            </th>
                            <td>
                                @if($budget->br)
                                    <span class="badge badge-relationship">{{ $budget->br->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.budget.fields.user') }}
                            </th>
                            <td>
                                @if($budget->user)
                                    <span class="badge badge-relationship">{{ $budget->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.budget.fields.fiscal_year') }}
                            </th>
                            <td>
                                @if($budget->fiscalYear)
                                    <span class="badge badge-relationship">{{ $budget->fiscalYear->date ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.budget.fields.amount') }}
                            </th>
                            <td>
                                {{ $budget->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.budget.fields.expense_amount') }}
                            </th>
                            <td>
                                {{ $budget->expense_amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.budget.fields.status') }}
                            </th>
                            <td>
                                {{ $budget->status_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('budget_edit')
                    <a href="{{ route('admin.budgets.edit', $budget) }}" class="btn btn-indigo mr-2">
                        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    </a>
                @endcan
                <a href="{{ route('admin.budgets.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection