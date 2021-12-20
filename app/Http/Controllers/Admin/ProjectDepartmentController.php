<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\ProjectDepartment;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectDepartmentController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = ProjectDepartment::class;
    }

    public function index()
    {
        abort_if(Gate::denies('project_department_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.project-department.index');
    }

    public function create()
    {
        abort_if(Gate::denies('project_department_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.project-department.create');
    }

    public function edit(ProjectDepartment $projectDepartment)
    {
        abort_if(Gate::denies('project_department_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.project-department.edit', compact('projectDepartment'));
    }

    public function show(ProjectDepartment $projectDepartment)
    {
        abort_if(Gate::denies('project_department_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectDepartment->load('user', 'br');

        return view('admin.project-department.show', compact('projectDepartment'));
    }
}
