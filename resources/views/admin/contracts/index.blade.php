@extends('layouts.admin')
@section('content')
@can('contract_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.contracts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.contract.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.contract.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Contract">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.contract_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.user') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.city') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.address') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.contract_value') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.start_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.end_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.contract') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('contract_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.contracts.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.contracts.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'contract_type', name: 'contract_type' },
{ data: 'user_name', name: 'user.name' },
{ data: 'city', name: 'city' },
{ data: 'address', name: 'address' },
{ data: 'contract_value', name: 'contract_value' },
{ data: 'start_date', name: 'start_date' },
{ data: 'end_date', name: 'end_date' },
{ data: 'contract', name: 'contract', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-Contract').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection