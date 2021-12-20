@extends('layouts.admin')
@section('header')
    <div class="col-sm-6">
        <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.budgets.index') }}">
            <i class="fas fa-arrow-left"></i>
            {{ trans('global.back') }}
        </a>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">{{ trans('global.view') }}
                {{ trans('cruds.budget.title_singular') }}</li>
            <li class="breadcrumb-item"><a
                    href="{{ route('admin.budgets.index') }}">{{ trans('cruds.budget.title_singular') }}
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
                        @if ($budget->budget)
                            <span class="badge badge-relationship">{{ $budget->budget->name ?? '' }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.budget.fields.br') }}
                    </th>
                    <td>
                        @if ($budget->br)
                            <span class="badge badge-relationship">{{ $budget->br->name ?? '' }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.budget.fields.user') }}
                    </th>
                    <td>
                        @if ($budget->user)
                            <span class="badge badge-relationship">{{ $budget->user->name ?? '' }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.budget.fields.fiscal_year') }}
                    </th>
                    <td>
                        @if ($budget->fiscalYear)
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
            <a href="{{ route('admin.budgets.edit', $budget) }}" class="btn btn-sm mr-2">
                <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
            </a>
        @endcan
        <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.budgets.index') }}">
            <i class="fas fa-arrow-left"></i>
            {{ trans('global.back') }}
        </a>
    </div>
@endsection
