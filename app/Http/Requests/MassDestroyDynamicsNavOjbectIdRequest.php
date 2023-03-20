<?php

namespace App\Http\Requests;

use App\Models\DynamicsNavOjbectId;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDynamicsNavOjbectIdRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('dynamics_nav_ojbect_id_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:dynamics_nav_ojbect_ids,id',
        ];
    }
}
