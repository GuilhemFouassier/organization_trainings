@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editer la session {{$session->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::model($session, ['route' => ['update_session', $session->id]]) !!}
                        nom :{!! Form::text('name') !!}<br>
                        Date :{!! Form::date('date') !!}<br>
                        Nombre de places disponibles :{!! Form::text('availables_seats') !!}<br>
                        Configuration :{!! Form::select('configuration', ['0' => 'Non', '1' => 'Oui']) !!}<br>
                        Salle : {!! Form::select('room_id', $rooms->pluck('name', 'id')) !!}<br>
                        Professeur : {!! Form::select('teacher_id', $users->pluck('name', 'id')) !!}<br>
                        {!! Form::submit('Update Session') !!}
                    {!! Form::close() !!}
                    <a href="{{ route('delete_report', $session->id) }}">Supprimer la session</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
