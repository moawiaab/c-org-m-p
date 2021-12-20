@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                    {{ trans('cruds.shek.title_singular') }}:
                    {{ trans('cruds.shek.fields.id') }}
                    {{ $shek->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.shek.fields.id') }}
                            </th>
                            <td>
                                {{ $shek->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.shek.fields.expense') }}
                            </th>
                            <td>
                                @if($shek->expense)
                                    <span class="badge badge-relationship">{{ $shek->expense->amount ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.shek.fields.project') }}
                            </th>
                            <td>
                                @if($shek->project)
                                    <span class="badge badge-relationship">{{ $shek->project->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.shek.fields.type') }}
                            </th>
                            <td>
                                {{ $shek->type_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.shek.fields.amount') }}
                            </th>
                            <td>
                                {{ $shek->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.shek.fields.bank') }}
                            </th>
                            <td>
                                @if($shek->bank)
                                    <span class="badge badge-relationship">{{ $shek->bank->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.shek.fields.user') }}
                            </th>
                            <td>
                                @if($shek->user)
                                    <span class="badge badge-relationship">{{ $shek->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.shek.fields.br') }}
                            </th>
                            <td>
                                @if($shek->br)
                                    <span class="badge badge-relationship">{{ $shek->br->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.shek.fields.shek_number') }}
                            </th>
                            <td>
                                {{ $shek->shek_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.shek.fields.entry_date') }}
                            </th>
                            <td>
                                {{ $shek->entry_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.shek.fields.amount_text') }}
                            </th>
                            <td>
                                {{ $shek->amount_text }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.shek.fields.status') }}
                            </th>
                            <td>
                                {{ $shek->status_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('shek_edit')
                    <a href="{{ route('admin.sheks.edit', $shek) }}" class="btn btn-indigo mr-2">
                        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    </a>
                @endcan
                <a href="{{ route('admin.sheks.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection