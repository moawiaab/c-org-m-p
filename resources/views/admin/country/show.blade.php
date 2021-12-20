@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                    {{ trans('cruds.country.title_singular') }}:
                    {{ trans('cruds.country.fields.id') }}
                    {{ $country->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.country.fields.id') }}
                            </th>
                            <td>
                                {{ $country->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.country.fields.name') }}
                            </th>
                            <td>
                                {{ $country->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.country.fields.code') }}
                            </th>
                            <td>
                                {{ $country->code }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('country_edit')
                    <a href="{{ route('admin.countries.edit', $country) }}" class="btn btn-indigo mr-2">
                        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    </a>
                @endcan
                <a href="{{ route('admin.countries.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection