@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dynamicsNavObjectType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dynamics-nav-object-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dynamicsNavObjectType.fields.id') }}
                        </th>
                        <td>
                            {{ $dynamicsNavObjectType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dynamicsNavObjectType.fields.name') }}
                        </th>
                        <td>
                            {{ $dynamicsNavObjectType->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dynamics-nav-object-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection