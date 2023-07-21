@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.video.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.videos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.video.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $video->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.video.fields.text') }}
                                    </th>
                                    <td>
                                        {{ $video->text }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.video.fields.youtube') }}
                                    </th>
                                    <td>
                                        {{ $video->youtube }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.video.fields.button') }}
                                    </th>
                                    <td>
                                        {{ $video->button }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.video.fields.link') }}
                                    </th>
                                    <td>
                                        {{ $video->link }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.videos.index') }}">
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