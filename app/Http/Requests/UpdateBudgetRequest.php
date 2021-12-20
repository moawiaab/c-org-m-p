<?php

namespace App\Http\Requests;

use App\Models\Budget;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBudgetRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('budget_edit'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'budget_id' => [
                'integer',
                'exists:budget_names,id',
                'required',
            ],
            'br_id' => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'fiscal_year_id' => [
                'integer',
                'exists:fiscal_years,id',
                'nullable',
            ],
            'amount' => [
                'numeric',
                'required',
            ],
            'expense_amount' => [
                'numeric',
                'nullable',
            ],
            'status' => [
                'nullable',
                'in:' . implode(',', array_keys(Budget::STATUS_RADIO)),
            ],
        ];
    }
}
