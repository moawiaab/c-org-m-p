<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Shek;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShekController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = Shek::class;
    }

    public function index()
    {
        abort_if(Gate::denies('shek_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shek.index');
    }

    public function create()
    {
        abort_if(Gate::denies('shek_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shek.create');
    }

    public function edit(Shek $shek)
    {
        abort_if(Gate::denies('shek_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shek.edit', compact('shek'));
    }

    public function show(Shek $shek)
    {
        abort_if(Gate::denies('shek_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shek->load('expense', 'project', 'bank', 'user', 'br');

        dd($shek->project);
        return view('admin.shek.show', compact('shek'));
    }
}
