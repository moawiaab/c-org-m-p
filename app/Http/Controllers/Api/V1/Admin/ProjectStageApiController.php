<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectStageRequest;
use App\Http\Requests\UpdateProjectStageRequest;
use App\Http\Resources\Admin\ProjectStageResource;
use App\Models\ProjectStage;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectStageApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('project_stage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectStageResource(ProjectStage::with(['project', 'user', 'br', 'userCreated'])->get());
    }

    public function store(StoreProjectStageRequest $request)
    {
        $projectStage = ProjectStage::create($request->validated());
        $projectStage->user()->sync($request->input('user', []));

        return (new ProjectStageResource($projectStage))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProjectStage $projectStage)
    {
        abort_if(Gate::denies('project_stage_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectStageResource($projectStage->load(['project', 'user', 'br', 'userCreated']));
    }

    public function update(UpdateProjectStageRequest $request, ProjectStage $projectStage)
    {
        $projectStage->update($request->validated());
        $projectStage->user()->sync($request->input('user', []));

        return (new ProjectStageResource($projectStage))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProjectStage $projectStage)
    {
        abort_if(Gate::denies('project_stage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectStage->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
