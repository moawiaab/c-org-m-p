@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.stageDetail.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('stage_detail_create')
                    <a class="btn btn-indigo" href="{{ route('admin.stage-details.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.stageDetail.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('stage-detail.index', ['stage' => 'null', 'project' => 1, 'stageId' => 1])

    </div>
</div>
@endsection