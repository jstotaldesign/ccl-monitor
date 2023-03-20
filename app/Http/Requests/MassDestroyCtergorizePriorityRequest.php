<?php

namespace App\Http\Requests;

use App\Models\CtergorizePriority;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCtergorizePriorityRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ctergorize_priority_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:ctergorize_priorities,id',
        ];
    }
}
