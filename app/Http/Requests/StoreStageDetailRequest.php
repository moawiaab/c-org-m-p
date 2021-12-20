<?php

namespace App\Http\Requests;

use App\Models\StageDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStageDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('stage_detail_create'),
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
            'stage_id' => [
                'integer',
                'exists:project_stages,id',
                'nullable',
            ],
            'details' => [
                'string',
                'nullable',
            ],
            'project_id' => [
                'integer',
                'exists:projects,id',
                'nullable',
            ],
        ];
    }
}
