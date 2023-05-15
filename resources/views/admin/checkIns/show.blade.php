@extends('layouts.admin')
@section('content')

<div class="content">
    <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ trans('global.show') }} {{ trans('cruds.checkIn.title') }}
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.check-ins.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    {{ trans('cruds.checkIn.fields.id') }}
                                </th>
                                <td>
                                    {{ $checkIn->id }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.checkIn.fields.user') }}
                                </th>
                                <td>
                                    {{ $checkIn->user->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.checkIn.fields.type') }}
                                </th>
                                <td>
                                    {{ $checkIn->type->check_in_type ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.checkIn.fields.project') }}
                                </th>
                                <td>
                                    {{ $checkIn->project->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.checkIn.fields.check_in') }}
                                </th>
                                <td>
                                    {{ $checkIn->check_in ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.checkIn.fields.check_out') }}
                                </th>
                                <td>
                                    {{ $checkIn->check_out ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.checkIn.fields.work_type') }}
                                </th>
                                <td>
                                    {{ $checkIn->work_type->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.checkIn.fields.notes') }}
                                </th>
                                <td>
                                    {{ $checkIn->notes ?? '' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.check-ins.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
</div>
@endsection