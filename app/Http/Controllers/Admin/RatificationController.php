<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectStage;
use App\Models\Ratification;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RatificationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ratification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ratification.index');
    }

    public function create()
    {
        abort_if(Gate::denies('ratification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       
        return view('admin.ratification.create');
    }

    public function add(Project $project, ProjectStage $stage)
    {
        // abort_if(Gate::denies('ratification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // dd($project, $stage);
        return view('admin.ratification.create', compact('project', 'stage'));
    }

    public function edit(Ratification $ratification)
    {
        abort_if(Gate::denies('ratification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ratification.edit', compact('ratification'));
    }

    public function show(Ratification $ratification)
    {
        abort_if(Gate::denies('ratification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ratification->load('project', 'projectStage', 'user', 'br', 'projectManager', 'executive', 'financial', 'accountant');

        return view('admin.ratification.show', compact('ratification'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['ratification_create', 'ratification_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }
        if (request()->has('max_width') || request()->has('max_height')) {
            $this->validate(request(), [
                'file' => sprintf(
                'image|dimensions:max_width=%s,max_height=%s',
                request()->input('max_width', 100000),
                request()->input('max_height', 100000)
                ),
            ]);
        }

        $model                     = new Ratification();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
