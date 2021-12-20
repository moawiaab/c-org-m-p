@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.bank.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('bank_create')
                    <a class="btn btn-indigo" href="{{ route('admin.banks.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.bank.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('bank.index')

    </div>
</div>
@endsection