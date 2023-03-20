@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.issue.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.issues.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.issue.fields.id') }}
                        </th>
                        <td>
                            {{ $issue->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.issue.fields.nuber_excel') }}
                        </th>
                        <td>
                            {{ $issue->nuber_excel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.issue.fields.request_date') }}
                        </th>
                        <td>
                            {{ $issue->request_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.issue.fields.jobtype') }}
                        </th>
                        <td>
                            {{ $issue->jobtype->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.issue.fields.categorize_priority') }}
                        </th>
                        <td>
                            {{ $issue->categorize_priority->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.issue.fields.subject') }}
                        </th>
                        <td>
                            {!! $issue->subject !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.issue.fields.responsibility') }}
                        </th>
                        <td>
                            @foreach($issue->responsibilities as $key => $responsibility)
                                <span class="label label-info">{{ $responsibility->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.issue.fields.requester') }}
                        </th>
                        <td>
                            {{ $issue->requester->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.issue.fields.department') }}
                        </th>
                        <td>
                            {{ $issue->department->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.issue.fields.dynamics_nav_menu') }}
                        </th>
                        <td>
                            {{ $issue->dynamics_nav_menu->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.issue.fields.dynamics_nav_object') }}
                        </th>
                        <td>
                            @foreach($issue->dynamics_nav_objects as $key => $dynamics_nav_object)
                                <span class="label label-info">{{ $dynamics_nav_object->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.issues.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#subject_detail_of_subjects" role="tab" data-toggle="tab">
                {{ trans('cruds.detailOfSubject.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="subject_detail_of_subjects">
            @includeIf('admin.issues.relationships.subjectDetailOfSubjects', ['detailOfSubjects' => $issue->subjectDetailOfSubjects])
        </div>
    </div>
</div>

@endsection