@extends('layouts.admin')
@section('header')
    <div class="col-sm-6">
        <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.project-stages.index') }}">
            <i class="fas fa-arrow-left"></i>
            {{ trans('global.back') }}
        </a>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">{{ trans('global.view') }}
                {{ trans('cruds.projectStage.title_singular') }}</li>
            <li class="breadcrumb-item"><a
                    href="{{ route('admin.project-stages.index') }}">{{ trans('cruds.projectStage.title_singular') }}
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
                                {{ trans('cruds.projectStage.fields.status') }}
                            </th>
                            <td>
                                {{ $projectStage->status_label }}
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
                        
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('project_stage_edit')
                    <a href="{{ route('admin.project-stages.edit', $projectStage) }}" class="btn btn-sm mr-2">
                        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    </a>
                @endcan
                <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.project-stages.index') }}">
                    <i class="fas fa-arrow-left"></i>
                    {{ trans('global.back') }}
                </a>
            </div>
@endsection