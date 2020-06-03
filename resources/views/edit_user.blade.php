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
                    <div class="form-group row">
                            {{ Form::label('name', 'Name', ['class' => 'col-md-4 col-form-label text-md-right']) }} 
                            <div class="col-md-6">
                                {{ Form::text('name', $user->name, ['class' => 'form-control']) }} 
                            </div>
                        </div>
                        <div class="form-group row">
                        {{ Form::label('date_of_birth', 'Birth Date', ['class' => 'col-md-4 col-form-label text-md-right']) }} 
                            <div class="col-md-6">
                                {{ Form::date('date_of_birth', $user->birth_of_date, ['class' => 'form-control']) }} 
                            </div>
                        </div>
                        <div class="form-group row">
                        {{ Form::label('gender', 'Gender', ['class' => 'col-md-4 col-form-label text-md-right']) }} 
                            <div class="col-md-6">
                                {{ Form::select('gender', ['male' => 'Male', 'female' => 'Female', 'other'=>'Other'] ,$user->gender, ['class' => 'form-control']) }} 
                            </div>
                        </div>
                        <div class="form-group row">
                        {{ Form::label('job', 'Job', ['class' => 'col-md-4 col-form-label text-md-right']) }} 
                            <div class="col-md-6">
                                {{ Form::text('job' ,null, ['class' => 'form-control']) }} 
                            </div>
                        </div>
                        <div class="form-group row">
                        {{ Form::label('email', 'Email', ['class' => 'col-md-4 col-form-label text-md-right']) }} 
                            <div class="col-md-6">
                                {{ Form::email('email' ,null, ['class' => 'form-control']) }} 
                            </div>
                        </div>
                        <div class="form-group row">
                        {{ Form::label('role', 'Role', ['class' => 'col-md-4 col-form-label text-md-right']) }} 
                            <div class="col-md-6">
                                {{ Form::select('role', ['adm' => 'Admin', 'teacher' => 'Teacher', 'user'=>'Employee'] ,null, ['class' => 'form-control']) }} 
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                            {!! Form::submit('Edit the user', ['class' =>"btn btn-primary"]) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <a href="{{ route('delete_user', $user->id) }}" class="btn btn-danger">Delete the user</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
