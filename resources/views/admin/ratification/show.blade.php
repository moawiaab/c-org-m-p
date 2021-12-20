@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                    {{ trans('cruds.ratification.title_singular') }}:
                    {{ trans('cruds.ratification.fields.id') }}
                    {{ $ratification->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.ratification.fields.id') }}
                            </th>
                            <td>
                                {{ $ratification->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ratification.fields.project') }}
                            </th>
                            <td>
                                @if($ratification->project)
                                    <span class="badge badge-relationship">{{ $ratification->project->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ratification.fields.project_stage') }}
                            </th>
                            <td>
                                @if($ratification->projectStage)
                                    <span class="badge badge-relationship">{{ $ratification->projectStage->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ratification.fields.amount') }}
                            </th>
                            <td>
                                {{ $ratification->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ratification.fields.amount_text') }}
                            </th>
                            <td>
                                {{ $ratification->amount_text }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ratification.fields.beneficiary') }}
                            </th>
                            <td>
                                {{ $ratification->beneficiary }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ratification.fields.details') }}
                            </th>
                            <td>
                                {{ $ratification->details }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ratification.fields.invoices') }}
                            </th>
                            <td>
                                @foreach($ratification->invoices as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ratification.fields.user') }}
                            </th>
                            <td>
                                @if($ratification->user)
                                    <span class="badge badge-relationship">{{ $ratification->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ratification.fields.br') }}
                            </th>
                            <td>
                                @if($ratification->br)
                                    <span class="badge badge-relationship">{{ $ratification->br->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ratification.fields.project_manager') }}
                            </th>
                            <td>
                                @if($ratification->projectManager)
                                    <span class="badge badge-relationship">{{ $ratification->projectManager->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ratification.fields.executive') }}
                            </th>
                            <td>
                                @if($ratification->executive)
                                    <span class="badge badge-relationship">{{ $ratification->executive->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ratification.fields.financial') }}
                            </th>
                            <td>
                                @if($ratification->financial)
                                    <span class="badge badge-relationship">{{ $ratification->financial->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ratification.fields.accountant') }}
                            </th>
                            <td>
                                @if($ratification->accountant)
                                    <span class="badge badge-relationship">{{ $ratification->accountant->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ratification.fields.stage') }}
                            </th>
                            <td>
                                {{ $ratification->stage }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ratification.fields.feedback') }}
                            </th>
                            <td>
                                {{ $ratification->feedback }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('ratification_edit')
                    <a href="{{ route('admin.ratifications.edit', $ratification) }}" class="btn btn-indigo mr-2">
                        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    </a>
                @endcan
                <a href="{{ route('admin.ratifications.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection