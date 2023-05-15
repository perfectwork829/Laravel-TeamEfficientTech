@extends('layouts.admin')
@section('content')
<div class="content">
    @can('check_in_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.check-ins.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.checkIn.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.checkIn.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-CheckIn">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.checkIn.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.checkIn.fields.user') }}
                                </th>
                                <th>
                                    {{ trans('cruds.checkIn.fields.type') }}
                                </th>
                                <th>
                                    {{ trans('cruds.checkIn.fields.project') }}
                                </th>
                                <th>
                                    {{ trans('cruds.checkIn.fields.check_in') }}
                                </th>
                                <th>
                                    {{ trans('cruds.checkIn.fields.check_out') }}
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
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($users as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($check_in_types as $key => $item)
                                            <option value="{{ $item->check_in_type }}">{{ $item->check_in_type }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($time_projects as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('cruds.checkIn.fields.check_in') }}" strict>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('cruds.checkIn.fields.check_out') }}" strict>
                                </td>
                                <td>
                                </td>
                            </tr>
                        </thead>
                    </table>
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
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);

        @can('check_in_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.check-ins.massDestroy') }}",
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
                            data: { ids: ids, _method: 'DELETE' }
                        }).done(function () {
                            location.reload();
                        });
                    }
                }
            };
            dtButtons.push(deleteButton);
        @endcan

        let dtOverrideGlobals = {
            buttons: dtButtons,
            processing: true,
            serverSide: true,
            retrieve: true,
            aaSorting: [],
            ajax: "{{ route('admin.check-ins.index') }}",
            columns: [
                {data: 'placeholder', name: 'placeholder'},
                {data: 'id', name: 'id'},
                {data: 'user_name', name: 'user.name'},
                {data: 'type_check_in_type', name: 'type.check_in_type'},
                {data: 'project_name', name: 'project.name'},
                {data: 'check_in', name: 'check_in'},
                {data: 'check_out', name: 'check_out'},
                {data: 'actions', name: '{{ trans('global.actions') }}'},
            ],
            orderCellsTop: true,
            order: [[1, 'desc']],
            pageLength: 100,
        };

        let table = $('.datatable-CheckIn').DataTable(dtOverrideGlobals);

        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

        let visibleColumnsIndexes = null;

        $('.datatable thead').on('input', '.search', function () {
            let strict = $(this).attr('strict') || false;
            let value = strict && this.value ? "^" + this.value + "$" : this.value;

            let index = $(this).parent().index();
            if (visibleColumnsIndexes !== null) {
                index = visibleColumnsIndexes[index];
            }

            table
                .column(index)
                .search(value, strict)
                .draw();
        });

        table.on('column-visibility.dt', function(e, settings, column, state) {
            visibleColumnsIndexes = [];
            table.columns(":visible").every(function(colIdx) {
                visibleColumnsIndexes.push(colIdx);
            });
        });
    });
</script>
@endsection