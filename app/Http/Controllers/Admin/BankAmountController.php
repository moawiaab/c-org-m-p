<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\BankAmount;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BankAmountController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = BankAmount::class;
    }

    public function index()
    {
        abort_if(Gate::denies('bank_amount_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bank-amount.index');
    }

    public function create()
    {
        abort_if(Gate::denies('bank_amount_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bank-amount.create');
    }

    public function edit(BankAmount $bankAmount)
    {
        abort_if(Gate::denies('bank_amount_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bank-amount.edit', compact('bankAmount'));
    }

    public function show(BankAmount $bankAmount)
    {
        abort_if(Gate::denies('bank_amount_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankAmount->load('bankFrom', 'bankTo', 'br', 'user');

        return view('admin.bank-amount.show', compact('bankAmount'));
    }
}
