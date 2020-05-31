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
                        Grade ( / 20 ) : {!! Form::number('value') !!}<br>
                        {!! Form::submit('Edit the grade') !!}
                    {!! Form::close() !!}
                    <a href="{{ route('delete_grade', $grade[0]->id) }}">Delete the grade</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
