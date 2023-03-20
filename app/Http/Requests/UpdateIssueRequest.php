<?php

namespace App\Http\Requests;

use App\Models\Issue;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateIssueRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('issue_edit');
    }

    public function rules()
    {
        return [
            'nuber_excel' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'request_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'jobtype_id' => [
                'required',
                'integer',
            ],
            'categorize_priority_id' => [
                'required',
                'integer',
            ],
            'subject' => [
                'required',
            ],
            'responsibility_id' => [
                'required',
                'integer',
            ],
            'requester_id' => [
                'required',
                'integer',
            ],
            'department_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
