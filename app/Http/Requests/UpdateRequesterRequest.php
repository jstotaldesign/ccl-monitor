<?php

namespace App\Http\Requests;

use App\Models\Requester;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRequesterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('requester_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'department_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
