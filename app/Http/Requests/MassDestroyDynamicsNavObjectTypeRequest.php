<?php

namespace App\Http\Requests;

use App\Models\DynamicsNavObjectType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDynamicsNavObjectTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('dynamics_nav_object_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:dynamics_nav_object_types,id',
        ];
    }
}
