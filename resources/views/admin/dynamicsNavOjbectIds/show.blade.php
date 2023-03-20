@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dynamicsNavOjbectId.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dynamics-nav-ojbect-ids.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dynamicsNavOjbectId.fields.id') }}
                        </th>
                        <td>
                            {{ $dynamicsNavOjbectId->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dynamicsNavOjbectId.fields.type') }}
                        </th>
                        <td>
                            {{ $dynamicsNavOjbectId->type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dynamicsNavOjbectId.fields.object') }}
                        </th>
                        <td>
                            {{ $dynamicsNavOjbectId->object }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dynamics-nav-ojbect-ids.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection