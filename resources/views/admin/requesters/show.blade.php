@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.requester.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.requesters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.requester.fields.id') }}
                        </th>
                        <td>
                            {{ $requester->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requester.fields.name') }}
                        </th>
                        <td>
                            {{ $requester->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requester.fields.department') }}
                        </th>
                        <td>
                            {{ $requester->department->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.requesters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection