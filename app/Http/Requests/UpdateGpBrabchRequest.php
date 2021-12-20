<?php

namespace App\Http\Requests;

use App\Models\GpBranch;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGpBranchRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('gp_branch_edit'),
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
            'email' => [
                'email:rfc',
                'required',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
        ];
    }
}
