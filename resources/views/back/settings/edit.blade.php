@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit settings -
                        <small class="text-info">{{ $model->name ?? $model->key }}</small>
                    </div>
                    <div class="panel-body">
                        {!! Form::model($model, ['route' => ['settings.update', $model], 'method' =>'PUT', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ]) !!}
                        <div class="form-group">
                            {!! Form::label('value', 'value', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::textarea('value', null, ['class' => 'form-control', 'rows' => 7]) !!}
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
