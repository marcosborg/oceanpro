@extends('layouts.admin')
@section('content')
<div class="content">
    @can('quotation_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.quotations.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.quotation.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.quotation.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Quotation">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.quotation.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.quotation.fields.first_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.quotation.fields.last_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.quotation.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.quotation.fields.phone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.quotation.fields.subject') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.quotation.fields.message') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($quotations as $key => $quotation)
                                    <tr data-entry-id="{{ $quotation->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $quotation->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $quotation->first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $quotation->last_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $quotation->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $quotation->phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $quotation->subject->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $quotation->message ?? '' }}
                                        </td>
                                        <td>
                                            @can('quotation_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.quotations.show', $quotation->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('quotation_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.quotations.edit', $quotation->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('quotation_delete')
                                                <form action="{{ route('admin.quotations.destroy', $quotation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('quotation_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.quotations.massDestroy') }}",
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
  let table = $('.datatable-Quotation:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection