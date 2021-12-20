@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                    {{ trans('cruds.stageDetail.title_singular') }}:
                    {{ trans('cruds.stageDetail.fields.id') }}
                    {{ $stageDetail->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.stageDetail.fields.id') }}
                            </th>
                            <td>
                                {{ $stageDetail->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stageDetail.fields.stage') }}
                            </th>
                            <td>
                                @if($stageDetail->stage)
                                    <span class="badge badge-relationship">{{ $stageDetail->stage->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stageDetail.fields.details') }}
                            </th>
                            <td>
                                {{ $stageDetail->details }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stageDetail.fields.feedback') }}
                            </th>
                            <td>
                                {{ $stageDetail->feedback }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stageDetail.fields.images') }}
                            </th>
                            <td>
                                @foreach($stageDetail->images as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stageDetail.fields.project') }}
                            </th>
                            <td>
                                @if($stageDetail->project)
                                    <span class="badge badge-relationship">{{ $stageDetail->project->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stageDetail.fields.user') }}
                            </th>
                            <td>
                                @if($stageDetail->user)
                                    <span class="badge badge-relationship">{{ $stageDetail->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('stage_detail_edit')
                    <a href="{{ route('admin.stage-details.edit', $stageDetail) }}" class="btn btn-indigo mr-2">
                        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    </a>
                @endcan
                <a href="{{ route('admin.stage-details.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection