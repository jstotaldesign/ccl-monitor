@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.detailOfSubject.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.detail-of-subjects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.detailOfSubject.fields.id') }}
                        </th>
                        <td>
                            {{ $detailOfSubject->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detailOfSubject.fields.subject') }}
                        </th>
                        <td>
                            {{ $detailOfSubject->subject->nuber_excel ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detailOfSubject.fields.description') }}
                        </th>
                        <td>
                            {!! $detailOfSubject->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.detail-of-subjects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection