@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit a training</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::model($training, ['route' => ['update_training', $training->id]]) !!}
                    <div class="form-group row">
                            {{ Form::label('name', 'Name', ['class' => 'col-md-4 col-form-label text-md-right']) }} 
                            <div class="col-md-6">
                                {{ Form::text('name', null, ['class' => 'form-control']) }} 
                            </div>
                        </div>
                        <div class="form-group row">
                        {{ Form::label('duration', 'Duration', ['class' => 'col-md-4 col-form-label text-md-right']) }} 
                            <div class="col-md-6">
                                {{ Form::time('duration', null, ['class' => 'form-control']) }} 
                            </div>
                        </div>
                        <div class="form-group row">
                        {{ Form::label('teacher_id', 'Teacher', ['class' => 'col-md-4 col-form-label text-md-right']) }} 
                            <div class="col-md-6">
                                {{ Form::select('teacher_id', $users->pluck('name', 'id') ,null, ['class' => 'form-control']) }} 
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                            {!! Form::submit('Update the training', ['class' =>"btn btn-primary"]) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <a href="{{ route('delete_training', $training->id) }}" class="btn btn-danger">Delete the training</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
