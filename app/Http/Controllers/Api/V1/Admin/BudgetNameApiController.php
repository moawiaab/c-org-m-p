<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBudgetNameRequest;
use App\Http\Requests\UpdateBudgetNameRequest;
use App\Http\Resources\Admin\BudgetNameResource;
use App\Models\BudgetName;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BudgetNameApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('budget_name_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BudgetNameResource(BudgetName::with(['br', 'user'])->get());
    }

    public function store(StoreBudgetNameRequest $request)
    {
        $budgetName = BudgetName::create($request->validated());

        return (new BudgetNameResource($budgetName))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BudgetName $budgetName)
    {
        abort_if(Gate::denies('budget_name_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BudgetNameResource($budgetName->load(['br', 'user']));
    }

    public function update(UpdateBudgetNameRequest $request, BudgetName $budgetName)
    {
        $budgetName->update($request->validated());

        return (new BudgetNameResource($budgetName))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BudgetName $budgetName)
    {
        abort_if(Gate::denies('budget_name_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $budgetName->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
