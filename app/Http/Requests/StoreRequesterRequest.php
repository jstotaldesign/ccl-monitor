<?php

namespace App\Http\Requests;

use App\Models\Requester;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRequesterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('requester_create');
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
