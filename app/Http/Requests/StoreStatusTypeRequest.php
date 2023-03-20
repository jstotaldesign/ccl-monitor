<?php

namespace App\Http\Requests;

use App\Models\StatusType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStatusTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('status_type_create');
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
