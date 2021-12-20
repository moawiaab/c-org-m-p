@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                    {{ trans('cruds.projectStage.title_singular') }}:
                    {{ trans('cruds.projectStage.fields.id') }}
                    {{ $projectStage->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.projectStage.fields.id') }}
                            </th>
                            <td>
                                {{ $projectStage->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectStage.fields.name') }}
                            </th>
                            <td>
                                {{ $projectStage->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectStage.fields.details') }}
                            </th>
                            <td>
                                {{ $projectStage->details }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectStage.fields.amount') }}
                            </th>
                            <td>
                                {{ $projectStage->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectStage.fields.start_date') }}
                            </th>
                            <td>
                                {{ $projectStage->start_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectStage.fields.end_date') }}
                            </th>
                            <td>
                                {{ $projectStage->end_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectStage.fields.status') }}
                            </th>
                            <td>
                                {{ $projectStage->status_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectStage.fields.project') }}
                            </th>
                            <td>
                                @if($projectStage->project)
                                    <span class="badge badge-relationship">{{ $projectStage->project->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectStage.fields.user') }}
                            </th>
                            <td>
                                @foreach($projectStage->user as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectStage.fields.br') }}
                            </th>
                            <td>
                                @if($projectStage->br)
                                    <span class="badge badge-relationship">{{ $projectStage->br->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectStage.fields.user_created') }}
                            </th>
                            <td>
                                @if($projectStage->userCreated)
                                    <span class="badge badge-relationship">{{ $projectStage->userCreated->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('project_stage_edit')
                    <a href="{{ route('admin.project-stages.edit', $projectStage) }}" class="btn btn-indigo mr-2">
                        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    </a>
                @endcan
                <a href="{{ route('admin.project-stages.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection