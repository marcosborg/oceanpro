@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.quotation.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.quotations.update", [$quotation->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                            <label class="required" for="first_name">{{ trans('cruds.quotation.fields.first_name') }}</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name', $quotation->first_name) }}" required>
                            @if($errors->has('first_name'))
                                <span class="help-block" role="alert">{{ $errors->first('first_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.quotation.fields.first_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                            <label for="last_name">{{ trans('cruds.quotation.fields.last_name') }}</label>
                            <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', $quotation->last_name) }}">
                            @if($errors->has('last_name'))
                                <span class="help-block" role="alert">{{ $errors->first('last_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.quotation.fields.last_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="required" for="email">{{ trans('cruds.quotation.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $quotation->email) }}" required>
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.quotation.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="phone">{{ trans('cruds.quotation.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', $quotation->phone) }}">
                            @if($errors->has('phone'))
                                <span class="help-block" role="alert">{{ $errors->first('phone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.quotation.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
                            <label class="required" for="subject_id">{{ trans('cruds.quotation.fields.subject') }}</label>
                            <select class="form-control select2" name="subject_id" id="subject_id" required>
                                @foreach($subjects as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('subject_id') ? old('subject_id') : $quotation->subject->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('subject'))
                                <span class="help-block" role="alert">{{ $errors->first('subject') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.quotation.fields.subject_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                            <label class="required" for="message">{{ trans('cruds.quotation.fields.message') }}</label>
                            <textarea class="form-control" name="message" id="message" required>{{ old('message', $quotation->message) }}</textarea>
                            @if($errors->has('message'))
                                <span class="help-block" role="alert">{{ $errors->first('message') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.quotation.fields.message_helper') }}</span>
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