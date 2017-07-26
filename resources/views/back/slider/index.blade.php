@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Catalog
                        <div class="pull-right">
                            <a href="{{ route('slider.create') }}" class="btn btn-primary btn-xs">Add Image in slider</a>
                        </div>
                    </div>

                    <div class="panel-body">

                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Enable</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($models as $model)
                                <tr>
                                    <td>{{ link_to_route('slider.edit', $model->title ?? '<i class="text-danger">empty</i>', $model->id) }}</td>
                                    <td class="text-center">
                                        <span class="thumbnail">
                                            <img src="/{{ $model->image }}">
                                        </span>
                                    </td>
                                    <td class="text-center text-{{ $model->disabled ? 'danged' : 'success' }}">
                                        {{ $model->disabled ? '➖' : '✓' }}
                                    </td>
                                    <td class="text-center">
                                        {{ Form::open(['url' => route('slider.destroy', $model)]) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-warning btn-xs', 'onclick' => 'return confirm("Are you sure you want to delete this entry?")']) }}
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
