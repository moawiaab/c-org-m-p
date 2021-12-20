<?php

namespace App\Http\Requests;

use App\Models\Bank;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBankRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('bank_edit'),
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
            ],
            'details' => [
                'string',
                'nullable',
            ],
            'number' => [
                'string',
                'nullable',
            ],
            'amount' => [
                'numeric',
                'nullable',
            ],
            'amount_in' => [
                'numeric',
                'nullable',
            ],
            'amount_out' => [
                'numeric',
                'nullable',
            ],
            'status' => [
                'nullable',
                'in:' . implode(',', array_keys(Bank::STATUS_RADIO)),
            ],
        ];
    }
}