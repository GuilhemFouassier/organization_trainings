@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit session {{$session->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::model($session, ['route' => ['update_session', $session->id]]) !!}
                    <div class="form-group row">
                            {{ Form::label('name', 'Name', ['class' => 'col-md-4 col-form-label text-md-right']) }} 
                            <div class="col-md-6">
                                {{ Form::text('name', null, ['class' => 'form-control']) }} 
                            </div>
                        </div>
                        <div class="form-group row">
                        {{ Form::label('date', 'Date', ['class' => 'col-md-4 col-form-label text-md-right']) }} 
                            <div class="col-md-6">
                                {{ Form::date('date', null, ['class' => 'form-control']) }} 
                            </div>
                        </div>
                        <div class="form-group row">
                        {{ Form::label('configuration', 'Configuration', ['class' => 'col-md-4 col-form-label text-md-right']) }} 
                            <div class="col-md-6">
                                {{ Form::select('configuration', ['0' => 'No', '1' => 'Yes'] ,null, ['class' => 'form-control']) }} 
                            </div>
                        </div>
                        <div class="form-group row">
                        {{ Form::label('room_id', 'Room', ['class' => 'col-md-4 col-form-label text-md-right']) }} 
                            <div class="col-md-6">
                                {{ Form::select('room_id', $rooms->pluck('name', 'id') ,null, ['class' => 'form-control']) }} 
                            </div>
                        </div>
                        <div class="form-group row">
                        {{ Form::label('teacher_id', 'Role', ['class' => 'col-md-4 col-form-label text-md-right']) }} 
                            <div class="col-md-6">
                                {{ Form::select('teacher_id', $users->pluck('name', 'id') ,$session->teacher_id, ['class' => 'form-control']) }} 
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                            {!! Form::submit('Update the session', ['class' =>"btn btn-primary"]) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <a href="{{ route('delete_session', $session->id) }}" class="btn btn-danger">Delete the session</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
