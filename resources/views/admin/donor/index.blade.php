@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.donor.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('donor_create')
                    <a class="btn btn-indigo" href="{{ route('admin.donors.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.donor.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('donor.index')

    </div>
</div>
@endsection