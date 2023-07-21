@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.video.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.videos.update", [$video->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
                            <label class="required" for="text">{{ trans('cruds.video.fields.text') }}</label>
                            <input class="form-control" type="text" name="text" id="text" value="{{ old('text', $video->text) }}" required>
                            @if($errors->has('text'))
                                <span class="help-block" role="alert">{{ $errors->first('text') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.video.fields.text_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('youtube') ? 'has-error' : '' }}">
                            <label for="youtube">{{ trans('cruds.video.fields.youtube') }}</label>
                            <input class="form-control" type="text" name="youtube" id="youtube" value="{{ old('youtube', $video->youtube) }}">
                            @if($errors->has('youtube'))
                                <span class="help-block" role="alert">{{ $errors->first('youtube') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.video.fields.youtube_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('button') ? 'has-error' : '' }}">
                            <label for="button">{{ trans('cruds.video.fields.button') }}</label>
                            <input class="form-control" type="text" name="button" id="button" value="{{ old('button', $video->button) }}">
                            @if($errors->has('button'))
                                <span class="help-block" role="alert">{{ $errors->first('button') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.video.fields.button_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
                            <label for="link">{{ trans('cruds.video.fields.link') }}</label>
                            <input class="form-control" type="text" name="link" id="link" value="{{ old('link', $video->link) }}">
                            @if($errors->has('link'))
                                <span class="help-block" role="alert">{{ $errors->first('link') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.video.fields.link_helper') }}</span>
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