@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.user.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.email_verified_at') }}
                                    </th>
                                    <td>
                                        {{ $user->email_verified_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.roles') }}
                                    </th>
                                    <td>
                                        @foreach($user->roles as $key => $roles)
                                            <span class="label label-info">{{ $roles->title }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#assigned_to_tasks" aria-controls="assigned_to_tasks" role="tab" data-toggle="tab">
                            {{ trans('cruds.task.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#user_check_ins" aria-controls="user_check_ins" role="tab" data-toggle="tab">
                            {{ trans('cruds.checkIn.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#user_user_alerts" aria-controls="user_user_alerts" role="tab" data-toggle="tab">
                            {{ trans('cruds.userAlert.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="assigned_to_tasks">
                        @includeIf('admin.users.relationships.assignedToTasks', ['tasks' => $user->assignedToTasks])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="user_check_ins">
                        @includeIf('admin.users.relationships.userCheckIns', ['checkIns' => $user->userCheckIns])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="user_user_alerts">
                        @includeIf('admin.users.relationships.userUserAlerts', ['userAlerts' => $user->userUserAlerts])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection