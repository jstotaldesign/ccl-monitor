<?php

namespace App\Http\Requests;

use App\Models\CtergorizePriority;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCtergorizePriorityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ctergorize_priority_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
