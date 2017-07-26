@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Catalog</div>
                    <div class="panel-body">
                        @include('back.errors')
                        {{ Form::open(['url' => route('gallery.store', $catalog->id),'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) }}
                        <div class="form-group">
                            {!! Form::label('image', 'Image', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                <div data-provides="fileupload" class="fileupload fileupload-new">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                {!! Form::file('image', ['style' => 'line-height: 10px', 'required' => 'required', 'accept' => 'image/jpeg,image/png']) !!}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::hidden('disabled', 0) !!}
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
