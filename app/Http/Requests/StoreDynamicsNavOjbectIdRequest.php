<?php

namespace App\Http\Requests;

use App\Models\DynamicsNavOjbectId;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDynamicsNavOjbectIdRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dynamics_nav_ojbect_id_create');
    }

    public function rules()
    {
        return [
            'type_id' => [
                'required',
                'integer',
            ],
            'object' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
