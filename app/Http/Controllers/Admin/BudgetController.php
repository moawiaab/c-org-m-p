<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Budget;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BudgetController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = Budget::class;
    }

    public function index()
    {
        abort_if(Gate::denies('budget_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.budget.index');
    }

    public function create()
    {
        abort_if(Gate::denies('budget_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.budget.create');
    }

    public function edit(Budget $budget)
    {
        abort_if(Gate::denies('budget_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (auth()->user()->br_id !== 1 && $budget->br_id != auth()->user()->br_id) {
            abort_if(true, Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        return view('admin.budget.edit', compact('budget'));
    }

    public function show(Budget $budget)
    {
        abort_if(Gate::denies('budget_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (auth()->user()->br_id !== 1 && $budget->br_id != auth()->user()->br_id) {
            abort_if(true, Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        $budget->load('budget', 'br', 'user', 'fiscalYear');

        return view('admin.budget.show', compact('budget'));
    }
}
