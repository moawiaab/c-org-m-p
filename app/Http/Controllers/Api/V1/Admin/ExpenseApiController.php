<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Http\Resources\Admin\ExpenseResource;
use App\Models\Expense;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExpenseApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('expense_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExpenseResource(Expense::with(['budName', 'budget', 'br', 'user', 'administrative', 'executive', 'financial', 'accountant'])->get());
    }

    public function store(StoreExpenseRequest $request)
    {
        $expense = Expense::create($request->validated());

        foreach ($request->input('expense_invoice', []) as $file) {
            $expense->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('expense_invoice');
        }

        return (new ExpenseResource($expense))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Expense $expense)
    {
        abort_if(Gate::denies('expense_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExpenseResource($expense->load(['budName', 'budget', 'br', 'user', 'administrative', 'executive', 'financial', 'accountant']));
    }

    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $expense->update($request->validated());

        if (count($expense->expense_invoice) > 0) {
            foreach ($expense->expense_invoice as $media) {
                if (!in_array($media->file_name, $request->input('expense_invoice', []))) {
                    $media->delete();
                }
            }
        }
        $media = $expense->expense_invoice->pluck('file_name')->toArray();
        foreach ($request->input('expense_invoice', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $expense->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('expense_invoice');
            }
        }

        return (new ExpenseResource($expense))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Expense $expense)
    {
        abort_if(Gate::denies('expense_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expense->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
