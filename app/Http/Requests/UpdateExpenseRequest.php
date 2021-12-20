<?php

namespace App\Http\Requests;

use App\Models\Expense;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateExpenseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('expense_edit'),
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
            'bud_name_id' => [
                'integer',
                'exists:budget_names,id',
                'nullable',
            ],
            'budget_id' => [
                'integer',
                'exists:budgets,id',
                'nullable',
            ],
            'amount' => [
                'numeric',
                'nullable',
            ],
            'text_amount' => [
                'string',
                'required',
            ],
            'beneficiary' => [
                'string',
                'required',
            ],
            'details' => [
                'string',
                'required',
            ],
            'feeding' => [
                'string',
                'nullable',
            ],
        ];
    }
}
