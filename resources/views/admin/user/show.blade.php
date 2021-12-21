@extends('layouts.admin')
@section('header')
    <div class="col-sm-6">
        <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.users.index') }}">
            <i class="fas fa-arrow-left"></i>
            {{ trans('global.back') }}
        </a>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">{{ trans('global.view') }}
                {{ trans('cruds.user.title_singular') }}</li>
            <li class="breadcrumb-item"><a
                    href="{{ route('admin.users.index') }}">{{ trans('cruds.user.title_singular') }}
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
                        {{ trans('cruds.user.fields.id') }}
                    </th>
                    <td>
                        {{ $user->id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.user.fields.name') }}
                    </th>
                    <td>
                        {{ $user->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.user.fields.email') }}
                    </th>
                    <td>
                        <a class="link-light-blue" href="mailto:{{ $user->email }}">
                            <i class="far fa-envelope fa-fw">
                            </i>
                            {{ $user->email }}
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.user.fields.email_verified_at') }}
                    </th>
                    <td>
                        {{ $user->email_verified_at }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.user.fields.roles') }}
                    </th>
                    <td>
                        @foreach ($user->roles as $key => $entry)
                            <span class="badge badge-relationship">{{ $entry->title }}</span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.user.fields.locale') }}
                    </th>
                    <td>
                        {{ $user->locale }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.user.fields.br') }}
                    </th>
                    <td>
                        @if ($user->br)
                            <span class="badge badge-relationship">{{ $user->br->name ?? '' }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.user.fields.phone') }}
                    </th>
                    <td>
                        {{ $user->phone }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.user.fields.avatar') }}
                    </th>
                    <td>
                        @foreach ($user->avatar as $key => $entry)
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
        @can('user_edit')
            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm mr-2">
                <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
            </a>
        @endcan
        <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.users.index') }}">
            <i class="fas fa-arrow-left"></i>
            {{ trans('global.back') }}
        </a>
    </div>
@endsection
