@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit {{ $grade[0]->user->name }}'s grade for {{ $grade[0]->session->name }}'s </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::model($grade[0], ['url' => ["update_grade", $grade[0]->id]]) !!}
                    <div class="form-group row">
                            {{ Form::label('value', 'Grade ( /20 )', ['class' => 'col-md-4 col-form-label text-md-right']) }} 
                            <div class="col-md-6">
                                {{ Form::number('value', null, ['class' => 'form-control']) }} 
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                            {!! Form::submit('Edit the Grade', ['class' =>"btn btn-primary"]) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <a href="{{ route('delete_grade', $grade[0]->id) }}" class="btn btn-danger">Delete the grade</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
