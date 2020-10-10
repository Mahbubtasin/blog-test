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
                        <li><a href="#">Role</a></li>
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
                            <strong class="card-title">Role Create</strong>
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
                                        <h3 class="text-center">Role</h3>
                                    </div>
                                    <hr>
                                    {!! Form::open(['method' => 'post', 'action' => 'RoleController@store']) !!}
                                    <div class="form-group">
                                        {!! Form::label('name', 'Name', ['class' => 'control-label mb-1', 'id' => 'name']) !!}
                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('display_name', 'Display', ['class' => 'control-label mb-1', 'id' => 'display_name']) !!}
                                        {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('description', 'Description', ['class' => 'control-label mb-1', 'id' => 'description']) !!}
                                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                                    </div>
                                        <div class="form-group">
                                            {!! Form::label('permission', 'Permission', ['class' => 'control-label mb-1', 'id' => 'permission']) !!}
                                            {!! Form::select('permission[]', $permission, null, ['class' => 'form-control myselect', 'placeholder' => 'Select Permission', 'multiple']) !!}
                                        </div>
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Submit</span>
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