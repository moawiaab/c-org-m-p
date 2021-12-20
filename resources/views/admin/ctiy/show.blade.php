@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                    {{ trans('cruds.ctiy.title_singular') }}:
                    {{ trans('cruds.ctiy.fields.id') }}
                    {{ $ctiy->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.ctiy.fields.id') }}
                            </th>
                            <td>
                                {{ $ctiy->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ctiy.fields.name') }}
                            </th>
                            <td>
                                {{ $ctiy->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ctiy.fields.country') }}
                            </th>
                            <td>
                                @if($ctiy->country)
                                    <span class="badge badge-relationship">{{ $ctiy->country->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('ctiy_edit')
                    <a href="{{ route('admin.ctiys.edit', $ctiy) }}" class="btn btn-indigo mr-2">
                        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    </a>
                @endcan
                <a href="{{ route('admin.ctiys.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection