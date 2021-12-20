@extends('layouts.admin')
@section('header')
    <div class="col-sm-6">
        <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.branches.index') }}">
            <i class="fas fa-arrow-left"></i>
            {{ trans('global.back') }}
        </a>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">{{ trans('global.create') }}
                {{ trans('cruds.branch.title_singular') }}</li>
            <li class="breadcrumb-item"><a
                    href="{{ route('admin.branches.index') }}">{{ trans('cruds.branch.title_singular') }}
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
                        {{ trans('cruds.branch.fields.id') }}
                    </th>
                    <td>
                        {{ $branch->id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.branch.fields.name') }}
                    </th>
                    <td>
                        {{ $branch->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.branch.fields.address') }}
                    </th>
                    <td>
                        {{ $branch->address }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.branch.fields.email') }}
                    </th>
                    <td>
                        <a class="link-light-blue" href="mailto:{{ $branch->email }}">
                            <i class="far fa-envelope fa-fw">
                            </i>
                            {{ $branch->email }}
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.branch.fields.phone') }}
                    </th>
                    <td>
                        {{ $branch->phone }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.branch.fields.status') }}
                    </th>
                    <td>
                        {{ $branch->status_label }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.branch.fields.logo') }}
                    </th>
                    <td>
                        @foreach ($branch->logo as $key => $entry)
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
        @can('branch_edit')
            <a href="{{ route('admin.branches.edit', $branch) }}" class="btn btn-sm mr-2">
                <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
            </a>
        @endcan
        <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.branches.index') }}">
            <i class="fas fa-arrow-left"></i>
            {{ trans('global.back') }}
        </a>
    </div>

@endsection
