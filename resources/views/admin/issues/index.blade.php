@extends('layouts.admin')
@section('content')
@can('issue_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.issues.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.issue.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.issue.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Issue">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.issue.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.issue.fields.nuber_excel') }}
                        </th>
                        <th>
                            {{ trans('cruds.issue.fields.request_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.issue.fields.jobtype') }}
                        </th>
                        <th>
                            {{ trans('cruds.issue.fields.categorize_priority') }}
                        </th>
                        <th>
                            {{ trans('cruds.issue.fields.responsibility') }}
                        </th>
                        <th>
                            {{ trans('cruds.issue.fields.requester') }}
                        </th>
                        <th>
                            {{ trans('cruds.issue.fields.department') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($job_types as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($ctergorize_priorities as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($responsibilities as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($requesters as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($departments as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($issues as $key => $issue)
                        <tr data-entry-id="{{ $issue->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $issue->id ?? '' }}
                            </td>
                            <td>
                                {{ $issue->nuber_excel ?? '' }}
                            </td>
                            <td>
                                {{ $issue->request_date ?? '' }}
                            </td>
                            <td>
                                {{ $issue->jobtype->name ?? '' }}
                            </td>
                            <td>
                                {{ $issue->categorize_priority->name ?? '' }}
                            </td>
                            <td>
                                {{ $issue->responsibility->name ?? '' }}
                            </td>
                            <td>
                                {{ $issue->requester->name ?? '' }}
                            </td>
                            <td>
                                {{ $issue->department->name ?? '' }}
                            </td>
                            <td>
                                @can('issue_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.issues.show', $issue->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('issue_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.issues.edit', $issue->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('issue_delete')
                                    <form action="{{ route('admin.issues.destroy', $issue->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('issue_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.issues.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Issue:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection