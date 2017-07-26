@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Gallery for <span class="text-info">{{ $catalog->title }}</span>
                        <div class="pull-right">
                            <a href="{{ route('gallery.add', $catalog->id) }}" class="btn btn-primary btn-xs">Add New Image in Gallery</a>
                        </div>
                    </div>

                    <div class="panel-body">

                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif

                        <table class="table table-bordered">
                            <tbody>
                            @if(count($catalog->gallery))
                                @foreach($catalog->gallery as $model)
                                    <tr>
                                        <td>
                                        <span class="thumbnail">
                                            <img src="/{{ $model->image }}">
                                        </span>
                                        </td>
                                        <td class="text-center">
                                            {{ Form::open(['url' => route('gallery.destroy', $model)]) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-warning btn-xs', 'onclick' => 'return confirm("Are you sure you want to delete this image?")']) }}
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="2" class="text-danger">Gallery is empty</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
