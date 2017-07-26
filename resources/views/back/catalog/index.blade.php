@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Catalog
                        <div class="pull-right">
                            <a href="{{ route('catalog.create') }}" class="btn btn-primary btn-xs">Add Catalog</a>
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
                                <th>Alias</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Enable</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($models as $model)
                                <tr>
                                    <td>{{ link_to_route('catalog.edit', $model->title, $model->id) }}</td>
                                    <td>{{ $model->alias }}</td>
                                    <td>{{ $model->description }}</td>
                                    <td class="text-center"><span class="label label-{{ $model->image ? 'success' : 'danger' }}">{{ $model->image ? 'yes' : 'no' }}</span></td>
                                    <td class="text-center text-{{ $model->disabled ? 'danged' : 'success' }}">
                                        {{ $model->disabled ? '➖' : '✓' }}
                                    </td>
                                    <td class="text-center">
                                        {{ Form::open(['url' => route('catalog.destroy', $model)]) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-warning btn-xs', 'onclick' => 'return confirm("Are you sure you want to delete this entry?")']) }}
                                        {{ Form::close() }}
                                    </td>
                                    <td><a href="{{ route('gallery.index', $model->id) }}" class="btn btn-info btn-xs">Gallery</a></td>
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
