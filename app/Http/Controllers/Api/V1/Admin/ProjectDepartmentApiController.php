<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectDepartmentRequest;
use App\Http\Requests\UpdateProjectDepartmentRequest;
use App\Http\Resources\Admin\ProjectDepartmentResource;
use App\Models\ProjectDepartment;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectDepartmentApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('project_department_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectDepartmentResource(ProjectDepartment::with(['user', 'br'])->get());
    }

    public function store(StoreProjectDepartmentRequest $request)
    {
        $projectDepartment = ProjectDepartment::create($request->validated());

        return (new ProjectDepartmentResource($projectDepartment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProjectDepartment $projectDepartment)
    {
        abort_if(Gate::denies('project_department_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectDepartmentResource($projectDepartment->load(['user', 'br']));
    }

    public function update(UpdateProjectDepartmentRequest $request, ProjectDepartment $projectDepartment)
    {
        $projectDepartment->update($request->validated());

        return (new ProjectDepartmentResource($projectDepartment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProjectDepartment $projectDepartment)
    {
        abort_if(Gate::denies('project_department_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectDepartment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
