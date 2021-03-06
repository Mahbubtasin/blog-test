@extends('layouts.admin_master')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Author</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Author</a></li>
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
                            <strong class="card-title">Data Table</strong>
                            <a href="{{route('author.create')}}" class="btn btn-primary pull-right">Create</a>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($data as $i=>$all_data)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$all_data->name}}</td>
                                        <td>{{$all_data->email}}</td>
                                        <td>
                                            @if ($all_data->roles())
                                                <ul style="margin-left: 20px">
                                                    @foreach ($all_data->roles()->get() as $role)
                                                        <li>
                                                            {{$role->name}}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </td>
                                        <td>{{$all_data->created_at->diffForHumans()}}</td>
                                        <td>
                                            <div class="row">
                                                <a href="{{route('author.edit', $all_data->id)}}" class="btn btn-primary">Edit</a>
                                                {!! Form::open(['method' => 'DELETE', 'action' => ['AuthorController@destroy', $all_data->id]]) !!}
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
