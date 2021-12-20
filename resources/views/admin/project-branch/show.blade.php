@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                    {{ trans('cruds.projectBranch.title_singular') }}:
                    {{ trans('cruds.projectBranch.fields.id') }}
                    {{ $projectBranch->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.projectBranch.fields.id') }}
                            </th>
                            <td>
                                {{ $projectBranch->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectBranch.fields.name') }}
                            </th>
                            <td>
                                {{ $projectBranch->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectBranch.fields.details') }}
                            </th>
                            <td>
                                {{ $projectBranch->details }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectBranch.fields.proj') }}
                            </th>
                            <td>
                                @if($projectBranch->proj)
                                    <span class="badge badge-relationship">{{ $projectBranch->proj->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectBranch.fields.user') }}
                            </th>
                            <td>
                                @if($projectBranch->user)
                                    <span class="badge badge-relationship">{{ $projectBranch->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectBranch.fields.br') }}
                            </th>
                            <td>
                                @if($projectBranch->br)
                                    <span class="badge badge-relationship">{{ $projectBranch->br->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('project_branch_edit')
                    <a href="{{ route('admin.project-branches.edit', $projectBranch) }}" class="btn btn-indigo mr-2">
                        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    </a>
                @endcan
                <a href="{{ route('admin.project-branches.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection