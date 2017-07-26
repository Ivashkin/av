@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit -
                        <small>{{ $model->title }}</small>
                    </div>
                    <div class="panel-body">
                        @include('back.errors')

                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif

                        {!! Form::model($model, ['route' => ['slider.update', $model], 'method' =>'PUT', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ]) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Title', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if($model->image)
                            <div class="form-group">
                                <div class="col-lg-4 col-lg-offset-3">
                                    <span class="thumbnail">
                                        <img src="/{{ $model->image }}">
                                    </span>
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            {!! Form::label('image', 'Image', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                <div data-provides="fileupload" class="fileupload fileupload-new">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                {!! Form::file('image', ['style' => 'line-height: 10px', 'accept' => 'image/jpeg,image/png']) !!}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::hidden('disabled', 0) !!}
                                        {!! Form::checkbox('disabled', 1) !!} Disabled
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
