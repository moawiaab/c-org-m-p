<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FiscalYear;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FiscalYearController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fiscal_year_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fiscal-year.index');
    }

    public function create()
    {
        abort_if(Gate::denies('fiscal_year_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fiscal-year.create');
    }

    public function edit(FiscalYear $fiscalYear)
    {
        abort_if(Gate::denies('fiscal_year_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fiscal-year.edit', compact('fiscalYear'));
    }

    public function show(FiscalYear $fiscalYear)
    {
        abort_if(Gate::denies('fiscal_year_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fiscalYear->load('br', 'user');

        return view('admin.fiscal-year.show', compact('fiscalYear'));
    }
}
