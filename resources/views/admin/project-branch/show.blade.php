@extends('layouts.admin')

@section('header')
    <div class="col-sm-6">
        <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.project-branches.index') }}">
            <i class="fas fa-arrow-left"></i>
            {{ trans('global.back') }}
        </a>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">{{ trans('global.view') }}
                {{ trans('cruds.projectBranch.title_singular') }}</li>
            <li class="breadcrumb-item"><a
                    href="{{ route('admin.project-branches.index') }}">{{ trans('cruds.projectBranch.title_singular') }}
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
@endsection