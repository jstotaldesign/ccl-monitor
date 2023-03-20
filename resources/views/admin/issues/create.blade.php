@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.issue.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.issues.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nuber_excel">{{ trans('cruds.issue.fields.nuber_excel') }}</label>
                <input class="form-control {{ $errors->has('nuber_excel') ? 'is-invalid' : '' }}" type="number" name="nuber_excel" id="nuber_excel" value="{{ old('nuber_excel', '') }}" step="1">
                @if($errors->has('nuber_excel'))
                    <span class="text-danger">{{ $errors->first('nuber_excel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.issue.fields.nuber_excel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="request_date">{{ trans('cruds.issue.fields.request_date') }}</label>
                <input class="form-control datetime {{ $errors->has('request_date') ? 'is-invalid' : '' }}" type="text" name="request_date" id="request_date" value="{{ old('request_date') }}">
                @if($errors->has('request_date'))
                    <span class="text-danger">{{ $errors->first('request_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.issue.fields.request_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jobtype_id">{{ trans('cruds.issue.fields.jobtype') }}</label>
                <select class="form-control select2 {{ $errors->has('jobtype') ? 'is-invalid' : '' }}" name="jobtype_id" id="jobtype_id" required>
                    @foreach($jobtypes as $id => $entry)
                        <option value="{{ $id }}" {{ old('jobtype_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('jobtype'))
                    <span class="text-danger">{{ $errors->first('jobtype') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.issue.fields.jobtype_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="categorize_priority_id">{{ trans('cruds.issue.fields.categorize_priority') }}</label>
                <select class="form-control select2 {{ $errors->has('categorize_priority') ? 'is-invalid' : '' }}" name="categorize_priority_id" id="categorize_priority_id" required>
                    @foreach($categorize_priorities as $id => $entry)
                        <option value="{{ $id }}" {{ old('categorize_priority_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('categorize_priority'))
                    <span class="text-danger">{{ $errors->first('categorize_priority') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.issue.fields.categorize_priority_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subject">{{ trans('cruds.issue.fields.subject') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('subject') ? 'is-invalid' : '' }}" name="subject" id="subject">{!! old('subject') !!}</textarea>
                @if($errors->has('subject'))
                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.issue.fields.subject_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="responsibilities">{{ trans('cruds.issue.fields.responsibility') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('responsibilities') ? 'is-invalid' : '' }}" name="responsibilities[]" id="responsibilities" multiple required>
                    @foreach($responsibilities as $id => $responsibility)
                        <option value="{{ $id }}" {{ in_array($id, old('responsibilities', [])) ? 'selected' : '' }}>{{ $responsibility }}</option>
                    @endforeach
                </select>
                @if($errors->has('responsibilities'))
                    <span class="text-danger">{{ $errors->first('responsibilities') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.issue.fields.responsibility_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="requester_id">{{ trans('cruds.issue.fields.requester') }}</label>
                <select class="form-control select2 {{ $errors->has('requester') ? 'is-invalid' : '' }}" name="requester_id" id="requester_id" required>
                    @foreach($requesters as $id => $entry)
                        <option value="{{ $id }}" {{ old('requester_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('requester'))
                    <span class="text-danger">{{ $errors->first('requester') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.issue.fields.requester_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="department_id">{{ trans('cruds.issue.fields.department') }}</label>
                <select class="form-control select2 {{ $errors->has('department') ? 'is-invalid' : '' }}" name="department_id" id="department_id" required>
                    @foreach($departments as $id => $entry)
                        <option value="{{ $id }}" {{ old('department_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('department'))
                    <span class="text-danger">{{ $errors->first('department') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.issue.fields.department_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dynamics_nav_menu_id">{{ trans('cruds.issue.fields.dynamics_nav_menu') }}</label>
                <select class="form-control select2 {{ $errors->has('dynamics_nav_menu') ? 'is-invalid' : '' }}" name="dynamics_nav_menu_id" id="dynamics_nav_menu_id">
                    @foreach($dynamics_nav_menus as $id => $entry)
                        <option value="{{ $id }}" {{ old('dynamics_nav_menu_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dynamics_nav_menu'))
                    <span class="text-danger">{{ $errors->first('dynamics_nav_menu') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.issue.fields.dynamics_nav_menu_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dynamics_nav_objects">{{ trans('cruds.issue.fields.dynamics_nav_object') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('dynamics_nav_objects') ? 'is-invalid' : '' }}" name="dynamics_nav_objects[]" id="dynamics_nav_objects" multiple>
                    @foreach($dynamics_nav_objects as $id => $dynamics_nav_object)
                        <option value="{{ $id }}" {{ in_array($id, old('dynamics_nav_objects', [])) ? 'selected' : '' }}>{{ $dynamics_nav_object }}</option>
                    @endforeach
                </select>
                @if($errors->has('dynamics_nav_objects'))
                    <span class="text-danger">{{ $errors->first('dynamics_nav_objects') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.issue.fields.dynamics_nav_object_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.issues.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $issue->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection