<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectBranch;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectBranchController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('project_branch_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.project-branch.index');
    }

    public function create()
    {
        abort_if(Gate::denies('project_branch_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.project-branch.create');
    }

    public function edit(ProjectBranch $projectBranch)
    {
        abort_if(Gate::denies('project_branch_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.project-branch.edit', compact('projectBranch'));
    }

    public function show(ProjectBranch $projectBranch)
    {
        abort_if(Gate::denies('project_branch_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectBranch->load('proj', 'user', 'br');

        return view('admin.project-branch.show', compact('projectBranch'));
    }
}
