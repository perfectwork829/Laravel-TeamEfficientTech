@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.task.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.tasks.update", [$task->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('starttime') ? 'has-error' : '' }}">
                            <label class="required" for="starttime">{{ trans('cruds.task.fields.starttime') }}</label>
                            <input class="form-control datetime" type="text" name="starttime" id="starttime" value="{{ old('starttime', $task->starttime) }}" required>
                            @if($errors->has('starttime'))
                                <span class="help-block" role="alert">{{ $errors->first('starttime') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.task.fields.starttime_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('endtime') ? 'has-error' : '' }}">
                            <label class="required" for="endtime">{{ trans('cruds.task.fields.endtime') }}</label>
                            <input class="form-control datetime" type="text" name="endtime" id="endtime" value="{{ old('endtime', $task->endtime) }}" required>
                            @if($errors->has('endtime'))
                                <span class="help-block" role="alert">{{ $errors->first('endtime') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.task.fields.endtime_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.task.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description', $task->description) }}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.task.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('assigned_to') ? 'has-error' : '' }}">
                            <label class="required" for="assigned_to_id">{{ trans('cruds.task.fields.assigned_to') }}</label>
                            <select class="form-control select2" name="assigned_to_id" id="assigned_to_id" required>
                                @foreach($assigned_tos as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('assigned_to_id') ? old('assigned_to_id') : $task->assigned_to->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('assigned_to'))
                                <span class="help-block" role="alert">{{ $errors->first('assigned_to') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.task.fields.assigned_to_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection