<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\ProjectStage;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectStageController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = ProjectStage::class;
    }

    public function index()
    {
        abort_if(Gate::denies('project_stage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.project-stage.index');
    }

    public function create()
    {
        abort_if(Gate::denies('project_stage_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.project-stage.create');
    }

    public function edit(ProjectStage $projectStage)
    {
        abort_if(Gate::denies('project_stage_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.project-stage.edit', compact('projectStage'));
    }

    public function show(ProjectStage $projectStage)
    {
        abort_if(Gate::denies('project_stage_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectStage->load('user', 'br');

        return view('admin.project-stage.show', compact('projectStage'));
    }
}
