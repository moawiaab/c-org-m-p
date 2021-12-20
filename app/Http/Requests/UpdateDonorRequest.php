<?php

namespace App\Http\Requests;

use App\Models\Donor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDonorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('donor_edit'),
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
            'phone' => [
                'string',
                'nullable',
            ],
            'email' => [
                'email:rfc',
                'required',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'amount' => [
                'numeric',
                'nullable',
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
