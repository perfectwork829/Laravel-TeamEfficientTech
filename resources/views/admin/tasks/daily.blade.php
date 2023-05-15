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
                    Task daily{{ trans('cruds.task.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button id="daily_task_table_new" class="btn btn-success custom_margin10">
                                    Add New <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="daily_task_table">
                        <thead>
                            <tr>
                                <th>
                                    Client Name
                                </th>
                                <th>
                                    Site Address/Location
                                </th>
                                <th>
                                    Job Type
                                </th>
                                <th>
                                    Notes
                                </th>
                                <th>
                                    Start Time
                                </th>
                                <th>
                                    Engineer
                                </th>
                                <th>
                                    Check in
                                </th>
                                <th>
                                    Check out
                                </th>
                                <th>
								    Edit
                                </th>
                                <th>
                                    Delete
                                </th>
                            </tr>
                        </thead>
                        <tbody>                            
                            @foreach($tasks as $task) 
                                <tr>                                    
                                    <td>{{$task->clientName}}</td>
                                    <td>{{$task->siteAddress}}</td>
                                    <td>{{$task->workType}}</td>
                                    <td>{{$task->description}}</td>
                                    <td>{{$task->starttime}}</td>
                                    <td>{{$task->name}}</td>
                                    <td><input type="checkbox" value = "{{$task->checkIn}}" id="checkIn" {{((int)$task->checkIn)? 'checked': ''}}></td>                                    
                                    <td><input type="checkbox" value = "{{$task->checkOut}}" id="checkOut" {{((int)$task->checkOut)? 'checked': ''}}></td>
                                    <td>
                                        <a class="edit btn btn-xs btn-info" href="javascript:;" data-id="{{$task->id}}">
                                        Edit </a>
                                    </td>
                                    <td>
                                        <a class="delete btn btn-xs btn-danger" href="javascript:;" data-id="{{$task->id}}">
                                        Delete </a>
                                    </td>
                                </tr>                               
                            @endforeach                        
                        </tbody>
                    </table>
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
    $(document).ready(function(){        
        TableEditable.init();        
    });
</script>
@endsection