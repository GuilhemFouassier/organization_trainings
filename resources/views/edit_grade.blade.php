@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editer la Note de {{ $grade[0]->user->name }} pour la session : {{ $grade[0]->session->name }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::model($grade[0], ['url' => ["update_grade", $grade[0]->id]]) !!}
                        Note ( sur 20 ) : {!! Form::number('value') !!}<br>
                        {!! Form::submit('Modifier la note') !!}
                    {!! Form::close() !!}
                    <a href="{{ route('delete_grade', $grade[0]->id) }}">Supprimer la note</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
