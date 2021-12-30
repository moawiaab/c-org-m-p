<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Branch;
use App\Models\Budget;
use App\Models\Expense;
use App\Models\Shek;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExpenseController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = Expense::class;
    }

    public function index()
    {
        abort_if(Gate::denies('expense_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expense.index');
    }

    public function create()
    {
        abort_if(Gate::denies('expense_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expense.create');
    }

    public function edit(Expense $expense)
    {
        abort_if(Gate::denies('expense_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expense.edit', compact('expense'));
    }

    public function show(Expense $expense)
    {
        abort_if(Gate::denies('expense_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expense->load('budName', 'budget', 'br', 'user', 'administrative', 'executive', 'financial', 'accountant');

        return view('admin.expense.show', compact('expense'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['expense_create', 'expense_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }
        if (request()->has('max_width') || request()->has('max_height')) {
            $this->validate(request(), [
                'file' => sprintf(
                    'image|dimensions:max_width=%s,max_height=%s',
                    request()->input('max_width', 100000),
                    request()->input('max_height', 100000)
                ),
            ]);
        }

        $model                     = new Expense();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }

    public function print(Expense $expense)
    {
        $expense->load('budName', 'budget', 'user', 'administrative', 'executive', 'financial');
        $shek = Shek::with('bank')->where('expense_id', $expense->id)->first();

        $img = Branch::find(auth()->user()->br_id)->first()->logo->first();
        // dd($expense, $shek);
        return view('admin.expense.account', compact('expense', 'shek', 'img'));
    }
}
