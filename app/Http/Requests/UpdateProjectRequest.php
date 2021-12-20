<?php

namespace App\Http\Requests;

use App\Models\Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProjectRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('project_edit'),
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
                'required',
            ],
            'administrative_ratio' => [
                'numeric',
                'nullable',
            ],
            'ratio' => [
                'numeric',
                'nullable',
            ],
            'beneficiaries_number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'project_department_id' => [
                'integer',
                'exists:project_departments,id',
                'nullable',
            ],
            'project_branch_id' => [
                'integer',
                'exists:project_branches,id',
                'nullable',
            ],
            'donor_id' => [
                'integer',
                'exists:donors,id',
                'required',
            ],
            'user' => [
                'array',
            ],
            'user.*.id' => [
                'integer',
                'exists:users,id',
            ],
            'country_id' => [
                'integer',
                'exists:countries,id',
                'nullable',
            ],
            'city_id' => [
                'integer',
                'exists:ctiys,id',
                'nullable',
            ],
            'area_id' => [
                'integer',
                'exists:areas,id',
                'nullable',
            ],
            'status' => [
                'nullable',
                'in:' . implode(',', array_keys(Project::STATUS_RADIO)),
            ],
        ];
    }
}
