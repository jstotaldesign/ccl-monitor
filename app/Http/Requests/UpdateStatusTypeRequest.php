<?php

namespace App\Http\Requests;

use App\Models\StatusType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStatusTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('status_type_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
