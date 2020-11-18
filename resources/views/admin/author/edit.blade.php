@extends('layouts.admin_master')

@section('content')

    <script>
        jQuery(document).ready(function () {
            jQuery(".myselect").chosen({
                disable_search_threshold:10,
                no_result_text: "Oops, nothing found...",
                width: "100%"
            });
        });
    </script>

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Author</a></li>
                        <li class="active">Basic</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Author Edit</strong>
                        </div>
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    @if(count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    {{$error}}
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="card-title">
                                        <h3 class="text-center">Author</h3>
                                    </div>
                                    <hr>
                                    {!! Form::model($author, ['method' => 'patch', 'action' => ['AuthorController@update', $author->id]]) !!}
                                    <div class="form-group">
                                        {!! Form::label('name', 'Name', ['class' => 'control-label mb-1', 'id' => 'name']) !!}
                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('email', 'Email', ['class' => 'control-label mb-1', 'id' => 'email']) !!}
                                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('password', 'Password', ['class' => 'control-label mb-1', 'id' => 'password']) !!}
                                        {!! Form::password('password', ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('roles', 'Role', ['class' => 'control-label mb-1', 'id' => 'roles']) !!}
                                        {!! Form::select('roles[]', $roles, $select_roles, ['class' => 'form-control myselect', 'placeholder' => 'Select Role', 'multiple']) !!}
                                    </div>
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Update</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    </button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>

                    </div>
                </div> <!-- .card -->

            </div><!--/.col-->

@endsection
