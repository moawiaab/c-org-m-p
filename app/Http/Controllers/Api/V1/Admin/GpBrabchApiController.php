<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGpBranchRequest;
use App\Http\Requests\UpdateGpBranchRequest;
use App\Http\Resources\Admin\GpBranchResource;
use App\Models\GpBranch;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GpBranchApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gp_branch_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GpBranchResource(GpBranch::all());
    }

    public function store(StoreGpBranchRequest $request)
    {
        $gpBranch = GpBranch::create($request->validated());

        return (new GpBranchResource($gpBranch))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GpBranch $gpBranch)
    {
        abort_if(Gate::denies('gp_branch_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GpBranchResource($gpBranch);
    }

    public function update(UpdateGpBranchRequest $request, GpBranch $gpBranch)
    {
        $gpBranch->update($request->validated());

        return (new GpBranchResource($gpBranch))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GpBranch $gpBranch)
    {
        abort_if(Gate::denies('gp_branch_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gpBranch->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
