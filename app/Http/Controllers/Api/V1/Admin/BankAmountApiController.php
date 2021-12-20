<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBankAmountRequest;
use App\Http\Requests\UpdateBankAmountRequest;
use App\Http\Resources\Admin\BankAmountResource;
use App\Models\BankAmount;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BankAmountApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bank_amount_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BankAmountResource(BankAmount::with(['bankFrom', 'bankTo', 'br', 'user'])->get());
    }

    public function store(StoreBankAmountRequest $request)
    {
        $bankAmount = BankAmount::create($request->validated());

        return (new BankAmountResource($bankAmount))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BankAmount $bankAmount)
    {
        abort_if(Gate::denies('bank_amount_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BankAmountResource($bankAmount->load(['bankFrom', 'bankTo', 'br', 'user']));
    }

    public function update(UpdateBankAmountRequest $request, BankAmount $bankAmount)
    {
        $bankAmount->update($request->validated());

        return (new BankAmountResource($bankAmount))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BankAmount $bankAmount)
    {
        abort_if(Gate::denies('bank_amount_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankAmount->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
