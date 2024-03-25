@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.about.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-About">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.about.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.about.fields.site_name') }}
                            </th> 
                            <th>
                                {{ trans('cruds.about.fields.logo') }}
                            </th> 
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($abouts as $key => $about)
                            <tr data-entry-id="{{ $about->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $about->id ?? '' }}
                                </td>
                                <td>
                                    {{ $about->site_name ?? '' }}
                                </td> 
                                <td>
                                    @if ($about->logo)
                                        <a href="{{ $about->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $about->logo->getUrl('thumb') }}">
                                        </a>
                                    @endif
                                </td> 
                                <td> 
                                    @can('about_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.abouts.edit', $about->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
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
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons) 

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            });
            let table = $('.datatable-About:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
