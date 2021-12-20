<?php

namespace App\Http\Requests;

use App\Models\ProjectBranch;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProjectBranchRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('project_branch_edit'),
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
            'proj_id' => [
                'integer',
                'exists:project_departments,id',
                'nullable',
            ],
            'user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'br_id' => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
        ];
    }
}
