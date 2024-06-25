@extends('admin.app')
@section('admin_content')

    <link href="{{asset('backend/select2/select2.min.css')}}" rel="stylesheet" />
    <script src="{{asset('backend/select2/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('backend/select2/select2.min.js')}}"></script>

    <style>
        .select2-container--default.select2-container--focus .select2-selection--multiple {
            background: #313a46 !important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
            color: black;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ETL</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Permission Manage</a></li>
                        <li class="breadcrumb-item active">Create User!</li>
                    </ol>
                </div>
                <h4 class="page-title">Create User!</h4>
            </div>
        </div>
    </div>
    <div class="card-header">
        <div class="d-flex justify-content-end">
            <a class="btn btn-success" href="{{ route('users.index') }}">Back</a>
        </div>
    </div>
    <br>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <p class="mb-1"><strong>Name:</strong></p>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong>Password:</strong>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong>Confirm Password:</strong>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong>Role:</strong>
                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control js-example-basic-multiple', 'multiple' => 'multiple')) !!}
            </div>
        </div>
        <div class="mt-1 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
