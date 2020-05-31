@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a new user</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => "create_user"]) !!}
                        Name :{!! Form::text('name') !!}<br>
                        Birth date :{!! Form::date('date_of_birth') !!}<br>
                        Gender :{!! Form::select('gender', ['male' => 'Male', 'female' => 'Female', 'other'=>'Other']) !!}<br>
                        Job :{!! Form::text('job') !!}<br>
                        Email: {!! Form::email('email') !!}<br>
                        Role :{!! Form::select('role', ['adm' => 'Admin', 'teacher' => 'Teacher', 'user'=>'Employee']) !!}<br>
                        Password :{!! Form::password('password') !!}<br>
                        {!! Form::submit('Add a user') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
