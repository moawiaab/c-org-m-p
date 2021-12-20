<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Ctiy;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CtiyController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = Ctiy::class;
    }

    public function index()
    {
        abort_if(Gate::denies('ctiy_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ctiy.index');
    }

    public function create()
    {
        abort_if(Gate::denies('ctiy_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ctiy.create');
    }

    public function edit(Ctiy $ctiy)
    {
        abort_if(Gate::denies('ctiy_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ctiy.edit', compact('ctiy'));
    }

    public function show(Ctiy $ctiy)
    {
        abort_if(Gate::denies('ctiy_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ctiy->load('country');

        return view('admin.ctiy.show', compact('ctiy'));
    }
}
