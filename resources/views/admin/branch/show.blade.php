@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                    {{ trans('cruds.branch.title_singular') }}:
                    {{ trans('cruds.branch.fields.id') }}
                    {{ $branch->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
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
                                @foreach($branch->logo as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('branch_edit')
                    <a href="{{ route('admin.branches.edit', $branch) }}" class="btn btn-indigo mr-2">
                        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    </a>
                @endcan
                <a href="{{ route('admin.branches.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection