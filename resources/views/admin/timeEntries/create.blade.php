@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.timeEntry.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.time-entries.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('work_type') ? 'has-error' : '' }}">
                            <label for="work_type_id">{{ trans('cruds.timeEntry.fields.work_type') }}</label>
                            <select class="form-control select2" name="work_type_id" id="work_type_id">
                                @foreach($work_types as $id => $entry)
                                    <option value="{{ $id }}" {{ old('work_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('work_type'))
                                <span class="help-block" role="alert">{{ $errors->first('work_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.timeEntry.fields.work_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('project') ? 'has-error' : '' }}">
                            <label for="project_id">{{ trans('cruds.timeEntry.fields.project') }}</label>
                            <select class="form-control select2" name="project_id" id="project_id">
                                @foreach($projects as $id => $entry)
                                    <option value="{{ $id }}" {{ old('project_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('project'))
                                <span class="help-block" role="alert">{{ $errors->first('project') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.timeEntry.fields.project_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                            <label class="required" for="start_time">{{ trans('cruds.timeEntry.fields.start_time') }}</label>
                            <input class="form-control datetime" type="text" name="start_time" id="start_time" value="{{ old('start_time') }}" required>
                            @if($errors->has('start_time'))
                                <span class="help-block" role="alert">{{ $errors->first('start_time') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.timeEntry.fields.start_time_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('end_time') ? 'has-error' : '' }}">
                            <label class="required" for="end_time">{{ trans('cruds.timeEntry.fields.end_time') }}</label>
                            <input class="form-control datetime" type="text" name="end_time" id="end_time" value="{{ old('end_time') }}" required>
                            @if($errors->has('end_time'))
                                <span class="help-block" role="alert">{{ $errors->first('end_time') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.timeEntry.fields.end_time_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
                            <label class="required" for="notes">{{ trans('cruds.timeEntry.fields.notes') }}</label>
                            <textarea class="form-control" name="notes" id="notes" required>{{ old('notes') }}</textarea>
                            @if($errors->has('notes'))
                                <span class="help-block" role="alert">{{ $errors->first('notes') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.timeEntry.fields.notes_helper') }}</span>
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