<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDonorRequest;
use App\Http\Requests\UpdateDonorRequest;
use App\Http\Resources\Admin\DonorResource;
use App\Models\Donor;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DonorApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('donor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DonorResource(Donor::with(['br', 'user'])->get());
    }

    public function store(StoreDonorRequest $request)
    {
        $donor = Donor::create($request->validated());

        return (new DonorResource($donor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Donor $donor)
    {
        abort_if(Gate::denies('donor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DonorResource($donor->load(['br', 'user']));
    }

    public function update(UpdateDonorRequest $request, Donor $donor)
    {
        $donor->update($request->validated());

        return (new DonorResource($donor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Donor $donor)
    {
        abort_if(Gate::denies('donor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $donor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
