<?php

namespace App\Http\Requests;

use App\Models\ProjectDepartment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProjectDepartmentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('project_department_create'),
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
                'nullable',
            ],
            'details' => [
                'string',
                'nullable',
            ],
        ];
    }
}
