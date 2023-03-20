<?php

namespace App\Http\Requests;

use App\Models\DynamicsNavMenu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDynamicsNavMenuRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dynamics_nav_menu_create');
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
