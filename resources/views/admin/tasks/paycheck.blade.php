@extends('layouts.admin')
@section('content')

<link href="{{ asset('css/task_custom.css') }}" rel="stylesheet" type="text/css"/>


<script src="{{ asset('js/table-editable.js') }}"></script>
<style>
 
</style>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading ">
                    Paycheck-{{ trans('cruds.task.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <h2 class="text-center bold">Biweekly Time Sheet</h2>
                    <form method="POST" action="{{ route('admin.tasks.payCheck') }}" enctype="multipart/form-data">
                       @csrf
                        <div class="row">
                            <div class="col-md-4">~~~</div>
                            <div class="col-md-8">
                                <div class="row custom_margin10">
                                    <div class="col-md-3">
                                        <p class="text-left">Pay period start date:</p>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group date" data-date-format="yyyy-mm-dd" id='payStartDate'>
                                            <input  type="text" class="form-control" placeholder="yyyy-mm-dd" name="payStartDate" value="{{old('payStartDate', $from)}}">
                                            <div class="input-group-addon" >
                                            <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>                
                                    </div>
                                </div>
                                <div class="row custom_margin10" >
                                    <div class="col-md-3">
                                        <p class="text-left">Pay period end date:</p>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group date" data-date-format="yyyy-mm-dd" id='payEndDate'>
                                            <input  type="text" class="form-control" placeholder="yyyy-mm-dd" name="payEndDate" value="{{old('payEndDate', $to)}}">
                                            <div class="input-group-addon" >
                                            <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>                
                                    </div>
                                </div>                        
                                <div class="row custom_margin10">
                                    <div class="col-md-3">
                                        <p class="text-left">Paycheck date:</p>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group date" data-date-format="yyyy-mm-dd" id='payCheckDate'>
                                            <input  type="text" class="form-control" placeholder="yyyy-mm-dd" name="payCheckDate">
                                            <div class="input-group-addon" >
                                            <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>                
                                    </div>
                                </div>                                                     
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <div class="row ">
                                    <div class="col-md-3">
                                        <p class="text-left">Employee:</p>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">                                
                                            <input class="form-control" type="text" name="text" id="text" required="" aria-autocomplete="list" value="{{$user_name}}" disabled>
                                        </div>              
                                    </div>
                                </div> 
                            </div>
                            <div class="col-md-8">                              
                                <div class="row ">
                                    <div class="col-md-3">
                                        <p class="text-left">Employee Phone:</p>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">                                
                                            <input class="form-control" type="text" name="text" id="text" aria-autocomplete="list">
                                        </div>              
                                    </div>
                                </div>                
                            </div>
                        </div>    
                        <div class="row ">
                            <div class="col-md-4">
                                <div class="row ">
                                    <div class="col-md-3">
                                        <p class="text-left">Manager:</p>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">                                
                                            <input class="form-control" type="text" name="text" id="text"  aria-autocomplete="list">
                                        </div>              
                                    </div>
                                </div> 
                            </div>
                            <div class="col-md-8 text-right">
                                <button class="edit btn btn-md btn-info" type="submit">
                                    View
                                </button>
                            </div>
                        </div>  
                    </form>
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->                    
                    <div class="table-responsive">          
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th colspan="2">Day</th>
                                <th>Time Start(Arrive at 1st Jobsite)</th>
                                <th>Time End(Leave Last Jobsite)</th>
                                <th>Lunch</th>
                                <th>Description(Sites Visited, Office work Completed)</th>
                                <th>Daily Hours</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($time_entry_lists !=null && isset($time_entry_lists))
                                    @foreach($time_entry_lists as $time_entry_list)
                                        <tr>
                                            <td>
                                                {{\Carbon\Carbon::parse($time_entry_list['start_time'])->format('l')}}
                                            </td>
                                            <td>
                                                {{\Carbon\Carbon::parse($time_entry_list['start_time'])->format('d/m/Y')}}
                                            </td>
                                            <td>
                                                {{\Carbon\Carbon::parse($time_entry_list['start_time'])->format('H:m:s')}}
                                            </td>
                                            <td>
                                                {{\Carbon\Carbon::parse($time_entry_list['end_time'])->format('H:m:s')}}
                                            </td>
                                            <td>{{$time_entry_list['lunch_length']}}</td>
                                            <td>{{$time_entry_list['notes']}}</td>
                                            <td>{{$time_entry_list['total_time']}}</td>                                        
                                        </tr>
                                    @endforeach   
                                @else      
                                    <tr>
                                        <td colspan="6">
                                            <p>no time list</p>
                                        </td>
                                    </tr>                              
                                @endif
                                                            
                            </tbody>
                        </table>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script>
    var editor;
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        @can('task_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.tasks.massDestroy') }}",
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

           
        //TableEditable.init(); 
        $('#payCheckDate, #payStartDate, #payEndDate').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });

</script>
@endsection