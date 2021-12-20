<?php

namespace App\Http\Requests;

use App\Models\Ctiy;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCtiyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('ctiy_create'),
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
            'country_id' => [
                'integer',
                'exists:countries,id',
                'nullable',
            ],
        ];
    }
}
