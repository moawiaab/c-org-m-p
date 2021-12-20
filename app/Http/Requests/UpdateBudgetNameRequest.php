<?php

namespace App\Http\Requests;

use App\Models\BudgetName;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBudgetNameRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('budget_name_edit'),
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
            'name' => [
                'string',
                'required',
                'unique:budget_names,name,' . request()->route('budgetName')->id,
            ],
            'details' => [
                'string',
                'nullable',
            ],
            'type' => [
                'nullable',
                'in:' . implode(',', array_keys(BudgetName::TYPE_RADIO)),
            ],
            'status' => [
                'nullable',
                'in:' . implode(',', array_keys(BudgetName::STATUS_RADIO)),
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
        ];
    }
}
