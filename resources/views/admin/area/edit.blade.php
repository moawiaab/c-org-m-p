@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    {{ trans('cruds.area.title_singular') }}:
                    {{ trans('cruds.area.fields.id') }}
                    {{ $area->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('area.edit', [$area])
        </div>
    </div>
</div>
@endsection