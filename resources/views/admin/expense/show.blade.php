@extends('layouts.admin')
@section('header')
    <div class="col-sm-6">
        <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.expenses.index') }}">
            <i class="fas fa-arrow-left"></i>
            {{ trans('global.back') }}
        </a>

        <a class="btn btn-sm bg-gradient-success" href="{{ route('admin.expenses.index') }}">
            <i class="fas fa-check"></i>
            {{ trans('global.transition') }}
        </a>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">{{ trans('global.view') }}
                {{ trans('cruds.expense.title_singular') }}</li>
            <li class="breadcrumb-item"><a
                    href="{{ route('admin.expenses.index') }}">{{ trans('cruds.expense.title_singular') }}
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
                        {{ trans('cruds.expense.fields.id') }}
                    </th>
                    <td>
                        {{ $expense->id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.expense.fields.bud_name') }}
                    </th>
                    <td>
                        @if ($expense->budName)
                            <span class="badge badge-relationship">{{ $expense->budName->name ?? '' }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.expense.fields.budget') }}
                    </th>
                    <td>
                        @if ($expense->budget)
                            <span class="badge badge-relationship">{{ $expense->budget->amount ?? '' }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.expense.fields.br') }}
                    </th>
                    <td>
                        @if ($expense->br)
                            <span class="badge badge-relationship">{{ $expense->br->name ?? '' }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.expense.fields.user') }}
                    </th>
                    <td>
                        @if ($expense->user)
                            <span class="badge badge-relationship">{{ $expense->user->name ?? '' }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.expense.fields.amount') }}
                    </th>
                    <td>
                        {{ $expense->amount }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.expense.fields.text_amount') }}
                    </th>
                    <td>
                        {{ $expense->text_amount }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.expense.fields.beneficiary') }}
                    </th>
                    <td>
                        {{ $expense->beneficiary }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.expense.fields.details') }}
                    </th>
                    <td>
                        {{ $expense->details }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.expense.fields.feeding') }}
                    </th>
                    <td>
                        {{ $expense->feeding }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.expense.fields.stage') }}
                    </th>
                    <td>
                        {{ $expense->stage }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.expense.fields.administrative') }}
                    </th>
                    <td>
                        @if ($expense->administrative)
                            <span class="badge badge-relationship">{{ $expense->administrative->name ?? '' }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.expense.fields.executive') }}
                    </th>
                    <td>
                        @if ($expense->executive)
                            <span class="badge badge-relationship">{{ $expense->executive->name ?? '' }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.expense.fields.financial') }}
                    </th>
                    <td>
                        @if ($expense->financial)
                            <span class="badge badge-relationship">{{ $expense->financial->name ?? '' }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.expense.fields.accountant') }}
                    </th>
                    <td>
                        @if ($expense->accountant)
                            <span class="badge badge-relationship">{{ $expense->accountant->name ?? '' }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.expense.fields.invoice') }}
                    </th>
                    <td>
                        @foreach ($expense->invoice as $key => $entry)
                            <a class="link-photo" href="{{ $entry['url'] }}">
                                <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}"
                                    title="{{ $entry['name'] }}">
                            </a>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="form-group">
        @can('expense_edit')
            <a href="{{ route('admin.expenses.edit', $expense) }}" class="btn btn-sm mr-2">
                <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
            </a>
        @endcan
        <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.expenses.index') }}">
            <i class="fas fa-arrow-left"></i>
            {{ trans('global.back') }}
        </a>
    </div>
@endsection
