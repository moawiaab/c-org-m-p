<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Treasury;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TreasuryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('treasury_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.treasury.index');
    }

    public function create()
    {
        abort_if(Gate::denies('treasury_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.treasury.create');
    }

    public function edit(Treasury $treasury)
    {
        abort_if(Gate::denies('treasury_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.treasury.edit', compact('treasury'));
    }

    public function show(Treasury $treasury)
    {
        abort_if(Gate::denies('treasury_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $treasury->load('br', 'user');

        return view('admin.treasury.show', compact('treasury'));
    }
}
