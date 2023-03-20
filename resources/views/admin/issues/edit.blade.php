@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.issue.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.issues.update", [$issue->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nuber_excel">{{ trans('cruds.issue.fields.nuber_excel') }}</label>
                <input class="form-control {{ $errors->has('nuber_excel') ? 'is-invalid' : '' }}" type="number" name="nuber_excel" id="nuber_excel" value="{{ old('nuber_excel', $issue->nuber_excel) }}" step="1">
                @if($errors->has('nuber_excel'))
                    <span class="text-danger">{{ $errors->first('nuber_excel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.issue.fields.nuber_excel_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jobtype_id">{{ trans('cruds.issue.fields.jobtype') }}</label>
                <select class="form-control select2 {{ $errors->has('jobtype') ? 'is-invalid' : '' }}" name="jobtype_id" id="jobtype_id" required>
                    @foreach($jobtypes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('jobtype_id') ? old('jobtype_id') : $issue->jobtype->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                        <option value="{{ $id }}" {{ (old('categorize_priority_id') ? old('categorize_priority_id') : $issue->categorize_priority->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('categorize_priority'))
                    <span class="text-danger">{{ $errors->first('categorize_priority') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.issue.fields.categorize_priority_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subject">{{ trans('cruds.issue.fields.subject') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('subject') ? 'is-invalid' : '' }}" name="subject" id="subject">{!! old('subject', $issue->subject) !!}</textarea>
                @if($errors->has('subject'))
                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.issue.fields.subject_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="responsibility_id">{{ trans('cruds.issue.fields.responsibility') }}</label>
                <select class="form-control select2 {{ $errors->has('responsibility') ? 'is-invalid' : '' }}" name="responsibility_id" id="responsibility_id" required>
                    @foreach($responsibilities as $id => $entry)
                        <option value="{{ $id }}" {{ (old('responsibility_id') ? old('responsibility_id') : $issue->responsibility->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('responsibility'))
                    <span class="text-danger">{{ $errors->first('responsibility') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.issue.fields.responsibility_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="requester_id">{{ trans('cruds.issue.fields.requester') }}</label>
                <select class="form-control select2 {{ $errors->has('requester') ? 'is-invalid' : '' }}" name="requester_id" id="requester_id" required>
                    @foreach($requesters as $id => $entry)
                        <option value="{{ $id }}" {{ (old('requester_id') ? old('requester_id') : $issue->requester->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                        <option value="{{ $id }}" {{ (old('department_id') ? old('department_id') : $issue->department->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('department'))
                    <span class="text-danger">{{ $errors->first('department') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.issue.fields.department_helper') }}</span>
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