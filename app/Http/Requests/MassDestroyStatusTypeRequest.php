<?php

namespace App\Http\Requests;

use App\Models\StatusType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStatusTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('status_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:status_types,id',
        ];
    }
}
