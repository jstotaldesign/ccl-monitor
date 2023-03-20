@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.dynamicsNavOjbectId.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.dynamics-nav-ojbect-ids.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="type_id">{{ trans('cruds.dynamicsNavOjbectId.fields.type') }}</label>
                <select class="form-control select2 {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type_id" id="type_id" required>
                    @foreach($types as $id => $entry)
                        <option value="{{ $id }}" {{ old('type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dynamicsNavOjbectId.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="object">{{ trans('cruds.dynamicsNavOjbectId.fields.object') }}</label>
                <input class="form-control {{ $errors->has('object') ? 'is-invalid' : '' }}" type="number" name="object" id="object" value="{{ old('object', '') }}" step="1" required>
                @if($errors->has('object'))
                    <span class="text-danger">{{ $errors->first('object') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dynamicsNavOjbectId.fields.object_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection