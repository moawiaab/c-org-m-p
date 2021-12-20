<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShekRequest;
use App\Http\Requests\UpdateShekRequest;
use App\Http\Resources\Admin\ShekResource;
use App\Models\Shek;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShekApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shek_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ShekResource(Shek::with(['expense', 'project', 'bank', 'user', 'br'])->get());
    }

    public function store(StoreShekRequest $request)
    {
        $shek = Shek::create($request->validated());

        return (new ShekResource($shek))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Shek $shek)
    {
        abort_if(Gate::denies('shek_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ShekResource($shek->load(['expense', 'project', 'bank', 'user', 'br']));
    }

    public function update(UpdateShekRequest $request, Shek $shek)
    {
        $shek->update($request->validated());

        return (new ShekResource($shek))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Shek $shek)
    {
        abort_if(Gate::denies('shek_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shek->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
