<?php

namespace App\Http\Requests;

use App\Models\ProjectStage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProjectStageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('project_stage_create'),
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
            'amount' => [
                'numeric',
                'nullable',
            ],
            'start_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'end_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'status' => [
                'nullable',
                'in:' . implode(',', array_keys(ProjectStage::STATUS_RADIO)),
            ],
            'project_id' => [
                'integer',
                'exists:projects,id',
                'nullable',
            ],
            'user' => [
                'array',
            ],
            'user.*.id' => [
                'integer',
                'exists:users,id',
            ],
            'br_id' => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'user_created_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }
}
