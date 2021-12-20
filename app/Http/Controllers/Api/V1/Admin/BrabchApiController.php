<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Http\Resources\Admin\BranchResource;
use App\Models\Branch;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BranchApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('branch_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BranchResource(Branch::all());
    }

    public function store(StoreBranchRequest $request)
    {
        $branch = Branch::create($request->validated());

        if ($request->input('branch_logo', false)) {
            $branch->addMedia(storage_path('tmp/uploads/' . basename($request->input('branch_logo'))))->toMediaCollection('branch_logo');
        }

        return (new BranchResource($branch))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Branch $branch)
    {
        abort_if(Gate::denies('branch_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BranchResource($branch);
    }

    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        $branch->update($request->validated());

        if ($request->input('branch_logo', false)) {
            if (!$branch->branch_logo || $request->input('branch_logo') !== $branch->branch_logo->file_name) {
                if ($branch->branch_logo) {
                    $branch->branch_logo->delete();
                }
                $branch->addMedia(storage_path('tmp/uploads/' . basename($request->input('branch_logo'))))->toMediaCollection('branch_logo');
            }
        } elseif ($branch->branch_logo) {
            $branch->branch_logo->delete();
        }

        return (new BranchResource($branch))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Branch $branch)
    {
        abort_if(Gate::denies('branch_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branch->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
