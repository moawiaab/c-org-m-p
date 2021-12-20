@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                    {{ trans('cruds.stageDetail.title_singular') }}:
                    {{ trans('cruds.stageDetail.fields.id') }}
                    {{ $stageDetail->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('stage-detail.edit', [$stageDetail])
        </div>
    </div>
</div>
@endsection