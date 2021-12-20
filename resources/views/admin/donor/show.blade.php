@extends('layouts.admin')
@section('header')
    <div class="col-sm-6">
        <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.donors.index') }}">
            <i class="fas fa-arrow-left"></i>
            {{ trans('global.back') }}
        </a>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">{{ trans('global.view') }}
                {{ trans('cruds.donor.title_singular') }}</li>
            <li class="breadcrumb-item"><a
                    href="{{ route('admin.donors.index') }}">{{ trans('cruds.donor.title_singular') }}
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
                        {{ trans('cruds.donor.fields.id') }}
                    </th>
                    <td>
                        {{ $donor->id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.donor.fields.name') }}
                    </th>
                    <td>
                        {{ $donor->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.donor.fields.details') }}
                    </th>
                    <td>
                        {{ $donor->details }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.donor.fields.phone') }}
                    </th>
                    <td>
                        {{ $donor->phone }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.donor.fields.email') }}
                    </th>
                    <td>
                        <a class="link-light-blue" href="mailto:{{ $donor->email }}">
                            <i class="far fa-envelope fa-fw">
                            </i>
                            {{ $donor->email }}
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.donor.fields.address') }}
                    </th>
                    <td>
                        {{ $donor->address }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.donor.fields.amount') }}
                    </th>
                    <td>
                        {{ $donor->amount }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.donor.fields.br') }}
                    </th>
                    <td>
                        @if ($donor->br)
                            <span class="badge badge-relationship">{{ $donor->br->name ?? '' }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.donor.fields.user') }}
                    </th>
                    <td>
                        @if ($donor->user)
                            <span class="badge badge-relationship">{{ $donor->user->name ?? '' }}</span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="form-group">
        @can('donor_edit')
            <a href="{{ route('admin.donors.edit', $donor) }}" class="btn btn-sm mr-2">
                <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
            </a>
        @endcan
        <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.donors.index') }}">
            <i class="fas fa-arrow-left"></i>
            {{ trans('global.back') }}
        </a>
    </div>

@endsection
