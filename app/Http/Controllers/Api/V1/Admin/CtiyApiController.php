<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCtiyRequest;
use App\Http\Requests\UpdateCtiyRequest;
use App\Http\Resources\Admin\CtiyResource;
use App\Models\Ctiy;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CtiyApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ctiy_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CtiyResource(Ctiy::with(['country'])->get());
    }

    public function store(StoreCtiyRequest $request)
    {
        $ctiy = Ctiy::create($request->validated());

        return (new CtiyResource($ctiy))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Ctiy $ctiy)
    {
        abort_if(Gate::denies('ctiy_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CtiyResource($ctiy->load(['country']));
    }

    public function update(UpdateCtiyRequest $request, Ctiy $ctiy)
    {
        $ctiy->update($request->validated());

        return (new CtiyResource($ctiy))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Ctiy $ctiy)
    {
        abort_if(Gate::denies('ctiy_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ctiy->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
