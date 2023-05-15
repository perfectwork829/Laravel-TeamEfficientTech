@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.checkInType.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.check-in-types.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('check_in_type') ? 'has-error' : '' }}">
                            <label class="required" for="check_in_type">{{ trans('cruds.checkInType.fields.check_in_type') }}</label>
                            <input class="form-control" type="text" name="check_in_type" id="check_in_type" value="{{ old('check_in_type', '') }}" required>
                            @if($errors->has('check_in_type'))
                                <span class="help-block" role="alert">{{ $errors->first('check_in_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.checkInType.fields.check_in_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
                            <label for="notes">{{ trans('cruds.checkInType.fields.notes') }}</label>
                            <textarea class="form-control" name="notes" id="notes">{{ old('notes') }}</textarea>
                            @if($errors->has('notes'))
                                <span class="help-block" role="alert">{{ $errors->first('notes') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.checkInType.fields.notes_helper') }}</span>
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