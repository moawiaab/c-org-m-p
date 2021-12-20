<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BudgetName;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BudgetNameController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('budget_name_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.budget-name.index');
    }

    public function create()
    {
        abort_if(Gate::denies('budget_name_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.budget-name.create');
    }

    public function edit(BudgetName $budgetName)
    {
        abort_if(Gate::denies('budget_name_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.budget-name.edit', compact('budgetName'));
    }

    public function show(BudgetName $budgetName)
    {
        abort_if(Gate::denies('budget_name_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $budgetName->load('br', 'user');

        return view('admin.budget-name.show', compact('budgetName'));
    }
}
