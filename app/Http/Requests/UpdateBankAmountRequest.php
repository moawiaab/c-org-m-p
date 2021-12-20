<?php

namespace App\Http\Requests;

use App\Models\BankAmount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBankAmountRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('bank_amount_edit'),
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
            'bank_from_id' => [
                'integer',
                'exists:banks,id',
                'nullable',
            ],
            'bank_to_id' => [
                'integer',
                'exists:banks,id',
                'nullable',
            ],
            'amount' => [
                'numeric',
                'nullable',
            ],
            'details' => [
                'string',
                'nullable',
            ],
        ];
    }
}
