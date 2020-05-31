@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update a user</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::model($user, ['route' => ['update_user', $user->id]]) !!}
                        Name :{!! Form::text('name') !!}<br>
                        Birth date :{!! Form::date('date_of_birth') !!}<br>
                        Genre :{!! Form::select('gender', ['male' => 'Male', 'female' => 'Female', 'other'=>'Other']) !!}<br>
                        Job :{!! Form::text('job') !!}<br>
                        Email: {!! Form::email('email') !!}<br>
                        Role :{!! Form::select('role', ['adm' => 'Admin', 'prof' => 'Teacher', 'user'=>'Employee']) !!}<br>
                        {!! Form::submit('Edit a user') !!}
                    {!! Form::close() !!}
                    <a href="{{ route('delete_user', $user->id) }}">Delete the user</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
