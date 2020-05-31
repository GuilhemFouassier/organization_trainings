@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (Auth::user()->role == "adm")
                    <div class="card-header">Vous êtes: Admin</div>
                        <div class="card-body">
                            <div class="alert" role="alert">
                                <a href="{{ url('/users') }}">Les utilisateurs</a> - <a href="{{ url('/trainings') }}">Les Formations</a>
                            </div>
                        </div>
                    </div>
                    @elseif (Auth::user()->role == "teacher")
                    <div class="card-header">Vous êtes: Teacher</div>
                        <div class="card-body">
                            <div class="alert" role="alert">
                                <a href="{{ url('/trainings') }}">Les Formations dont je suis responsables</a> - <a href="{{ url('/passed_sessions') }}">Mes sessions passées</a> - <a href="{{ url('/sessions_to_come') }}">Mes sessions à venir</a>
                            </div>
                        </div>
                    </div>
                    @elseif (Auth::user()->role == "user")
                    <div class="card-header">Vous êtes: Employee</div>
                        <div class="card-body">
                            <div class="alert" role="alert">
                                <a href="{{ url('/trainings') }}">Les Formations</a> - <a href="{{ url('/passed_sessions') }}">Mes sessions passées</a> - <a href="{{ url('/sessions_to_come') }}">Mes sessions à venir</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
