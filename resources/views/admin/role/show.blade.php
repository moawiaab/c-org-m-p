@extends('layouts.admin')
@section('header')
    <div class="col-sm-6">
        <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.roles.index') }}">
            <i class="fas fa-arrow-left"></i>
            {{ trans('global.back') }}
        </a>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">{{ trans('global.view') }}
                {{ trans('cruds.role.title_singular') }}</li>
            <li class="breadcrumb-item"><a
                    href="{{ route('admin.roles.index') }}">{{ trans('cruds.role.title_singular') }}
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
                        {{ trans('cruds.role.fields.id') }}
                    </th>
                    <td>
                        {{ $role->id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.role.fields.title') }}
                    </th>
                    <td>
                        {{ $role->title }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.role.fields.permissions') }}
                    </th>
                    <td>
                        @foreach ($role->permissions as $key => $entry)
                            <span class="badge badge-relationship">{{ $entry->title }}</span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.role.fields.br') }}
                    </th>
                    <td>
                        @if ($role->br)
                            <span class="badge badge-relationship">{{ $role->br->name ?? '' }}</span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="form-group">
        @can('role_edit')
            <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm mr-2">
                <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
            </a>
        @endcan
        <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.roles.index') }}">
            <i class="fas fa-arrow-left"></i>
            {{ trans('global.back') }}
        </a>
    </div>
@endsection
