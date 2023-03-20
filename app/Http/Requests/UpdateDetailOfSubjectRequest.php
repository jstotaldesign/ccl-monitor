<?php

namespace App\Http\Requests;

use App\Models\DetailOfSubject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDetailOfSubjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('detail_of_subject_edit');
    }

    public function rules()
    {
        return [
            'subject_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
