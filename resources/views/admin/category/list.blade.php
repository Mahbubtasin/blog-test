@extends('layouts.admin_master')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Category</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Category</a></li>
                        <li class="active">Data table</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        @if (\Illuminate\Support\Facades\Session::has('success'))
                            <p class="alert alert-success">{{session('success')}}</p>
                        @endif
                        <div class="card-header">
                            <strong class="card-title">Category</strong>
                            <a href="{{route('category.create')}}" class="btn btn-primary pull-right">Create</a>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($data as $i=>$all_data)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$all_data->name}}</td>
                                        <td>
                                            {!! Form::open(['method' => 'PUT', 'action' => ['CategoryController@status', $all_data->id]]) !!}
                                            @if ($all_data->status === 1)
                                                {!! Form::submit('Unpublish', ['class' => 'btn btn-danger']) !!}
                                            @else
                                                {!! Form::submit('Publish', ['class' => 'btn btn-danger']) !!}
                                            @endif
                                            {!! Form::close() !!}
                                        </td>
                                        <td>{{$all_data->created_at->diffForHumans()}}</td>
                                        <td>
                                            <div class="row">
                                                <a href="{{route('category.edit', $all_data->id)}}" class="btn btn-primary">Edit</a>
                                                {!! Form::open(['method' => 'DELETE', 'action' => ['CategoryController@destroy', $all_data->id]]) !!}
                                                <div class="form-group" style="display: inline">
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

@endsection
