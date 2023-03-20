<?php

namespace App\Http\Requests;

use App\Models\DetailOfSubject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDetailOfSubjectRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('detail_of_subject_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:detail_of_subjects,id',
        ];
    }
}
