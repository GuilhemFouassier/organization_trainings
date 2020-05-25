@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a Training</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::model($training, ['route' => ['update_training', $training->id]]) !!}
                        nom :{!! Form::text('name') !!}<br>
                        Durée :{!! Form::time('duration') !!}<br>
                        Professeur : {!! Form::select('teacher_id', $users->pluck('name', 'id')) !!}<br>
                        {!! Form::submit('Update Training') !!}
                    {!! Form::close() !!}
                    <a href="{{ route('delete_training', $training->id) }}">Supprimer la Formation</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
