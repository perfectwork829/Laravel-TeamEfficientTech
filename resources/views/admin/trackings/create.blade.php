@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.tracking.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.trackings.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('lat') ? 'has-error' : '' }}">
                            <label class="required" for="lat">{{ trans('cruds.tracking.fields.lat') }}</label>
                            <input class="form-control" type="text" name="lat" id="lat" value="{{ old('lat', '') }}" required>
                            @if($errors->has('lat'))
                                <span class="help-block" role="alert">{{ $errors->first('lat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tracking.fields.lat_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('lon') ? 'has-error' : '' }}">
                            <label class="required" for="lon">{{ trans('cruds.tracking.fields.lon') }}</label>
                            <input class="form-control" type="text" name="lon" id="lon" value="{{ old('lon', '') }}" required>
                            @if($errors->has('lon'))
                                <span class="help-block" role="alert">{{ $errors->first('lon') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tracking.fields.lon_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label class="required" for="user_id">{{ trans('cruds.tracking.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <span class="help-block" role="alert">{{ $errors->first('user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tracking.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('action') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.tracking.fields.action') }}</label>
                            <select class="form-control" name="action" id="action">
                                <option value disabled {{ old('action', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Tracking::ACTION_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('action', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('action'))
                                <span class="help-block" role="alert">{{ $errors->first('action') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tracking.fields.action_helper') }}</span>
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