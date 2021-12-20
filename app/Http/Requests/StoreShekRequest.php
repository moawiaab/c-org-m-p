<?php

namespace App\Http\Requests;

use App\Models\Shek;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreShekRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('shek_create'),
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
            'expense_id' => [
                'integer',
                'exists:expenses,id',
                'nullable',
            ],
            'project_id' => [
                'integer',
                'exists:projects,id',
                'nullable',
            ],
            'amount' => [
                'numeric',
                'nullable',
            ],
            'bank_id' => [
                'integer',
                'exists:banks,id',
                'nullable',
            ],
            'shek_number' => [
                'string',
                'nullable',
            ],
            'entry_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'amount_text' => [
                'string',
                'nullable',
            ],
        ];
    }
}
