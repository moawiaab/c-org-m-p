@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                    {{ trans('cruds.donor.title_singular') }}:
                    {{ trans('cruds.donor.fields.id') }}
                    {{ $donor->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
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
                                @if($donor->br)
                                    <span class="badge badge-relationship">{{ $donor->br->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.donor.fields.user') }}
                            </th>
                            <td>
                                @if($donor->user)
                                    <span class="badge badge-relationship">{{ $donor->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('donor_edit')
                    <a href="{{ route('admin.donors.edit', $donor) }}" class="btn btn-indigo mr-2">
                        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    </a>
                @endcan
                <a href="{{ route('admin.donors.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection