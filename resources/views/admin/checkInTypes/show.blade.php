@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.checkInType.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.check-in-types.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.checkInType.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $checkInType->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.checkInType.fields.check_in_type') }}
                                    </th>
                                    <td>
                                        {{ $checkInType->check_in_type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.checkInType.fields.notes') }}
                                    </th>
                                    <td>
                                        {{ $checkInType->notes }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.check-in-types.index') }}">
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
                        <a href="#type_check_ins" aria-controls="type_check_ins" role="tab" data-toggle="tab">
                            {{ trans('cruds.checkIn.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="type_check_ins">
                        @includeIf('admin.checkInTypes.relationships.typeCheckIns', ['checkIns' => $checkInType->typeCheckIns])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection