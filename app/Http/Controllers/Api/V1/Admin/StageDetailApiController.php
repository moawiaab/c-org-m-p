<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreStageDetailRequest;
use App\Http\Requests\UpdateStageDetailRequest;
use App\Http\Resources\Admin\StageDetailResource;
use App\Models\StageDetail;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StageDetailApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('stage_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StageDetailResource(StageDetail::with(['stage', 'project', 'user'])->get());
    }

    public function store(StoreStageDetailRequest $request)
    {
        $stageDetail = StageDetail::create($request->validated());

        foreach ($request->input('stage_detail_images', []) as $file) {
            $stageDetail->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('stage_detail_images');
        }

        return (new StageDetailResource($stageDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StageDetail $stageDetail)
    {
        abort_if(Gate::denies('stage_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StageDetailResource($stageDetail->load(['stage', 'project', 'user']));
    }

    public function update(UpdateStageDetailRequest $request, StageDetail $stageDetail)
    {
        $stageDetail->update($request->validated());

        if (count($stageDetail->stage_detail_images) > 0) {
            foreach ($stageDetail->stage_detail_images as $media) {
                if (!in_array($media->file_name, $request->input('stage_detail_images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $stageDetail->stage_detail_images->pluck('file_name')->toArray();
        foreach ($request->input('stage_detail_images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $stageDetail->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('stage_detail_images');
            }
        }

        return (new StageDetailResource($stageDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StageDetail $stageDetail)
    {
        abort_if(Gate::denies('stage_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stageDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
