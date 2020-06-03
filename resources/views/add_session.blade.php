@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a new session:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => ["create_session", $training->id]]) !!}
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
                                {{ Form::select('teacher_id', $users->pluck('name', 'id') ,null, ['class' => 'form-control']) }} 
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                            {!! Form::submit('Add a Session', ['class' =>"btn btn-primary"]) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
