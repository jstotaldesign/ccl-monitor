<?php

namespace App\Http\Requests;

use App\Models\DynamicsNavObjectType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDynamicsNavObjectTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dynamics_nav_object_type_edit');
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
