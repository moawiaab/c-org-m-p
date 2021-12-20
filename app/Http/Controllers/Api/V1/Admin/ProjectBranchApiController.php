<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectBranchRequest;
use App\Http\Requests\UpdateProjectBranchRequest;
use App\Http\Resources\Admin\ProjectBranchResource;
use App\Models\ProjectBranch;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectBranchApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('project_branch_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectBranchResource(ProjectBranch::with(['proj', 'user', 'br'])->get());
    }

    public function store(StoreProjectBranchRequest $request)
    {
        $projectBranch = ProjectBranch::create($request->validated());

        return (new ProjectBranchResource($projectBranch))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProjectBranch $projectBranch)
    {
        abort_if(Gate::denies('project_branch_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectBranchResource($projectBranch->load(['proj', 'user', 'br']));
    }

    public function update(UpdateProjectBranchRequest $request, ProjectBranch $projectBranch)
    {
        $projectBranch->update($request->validated());

        return (new ProjectBranchResource($projectBranch))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProjectBranch $projectBranch)
    {
        abort_if(Gate::denies('project_branch_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectBranch->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
