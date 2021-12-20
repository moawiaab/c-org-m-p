@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                    {{ trans('cruds.area.title_singular') }}:
                    {{ trans('cruds.area.fields.id') }}
                    {{ $area->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.area.fields.id') }}
                            </th>
                            <td>
                                {{ $area->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.area.fields.name') }}
                            </th>
                            <td>
                                {{ $area->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.area.fields.city') }}
                            </th>
                            <td>
                                @if($area->city)
                                    <span class="badge badge-relationship">{{ $area->city->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.area.fields.country') }}
                            </th>
                            <td>
                                @if($area->country)
                                    <span class="badge badge-relationship">{{ $area->country->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('area_edit')
                    <a href="{{ route('admin.areas.edit', $area) }}" class="btn btn-indigo mr-2">
                        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    </a>
                @endcan
                <a href="{{ route('admin.areas.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection