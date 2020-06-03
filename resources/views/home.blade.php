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
                    <div class="card-header">You are : Admin</div>
                        <div class="card-body">
                            <div class="alert" role="alert">
                                <a href="{{ url('/users') }}" class="btn btn-outline-dark">Users</a> - <a href="{{ url('/trainings') }}" class="btn btn-outline-dark">Trainings</a>
                            </div>
                        </div>
                    </div>
                    @elseif (Auth::user()->role == "teacher")
                    <div class="card-header">You are : Teacher</div>
                        <div class="card-body">
                            <div class="alert" role="alert">
                                <a href="{{ url('/trainings') }}" class="btn btn-outline-dark">Trainings i'm in charge of</a> - <a href="{{ url('/passed_sessions') }}" class="btn btn-outline-dark">My passed sessions</a> - <a href="{{ url('/sessions_to_come') }}" class="btn btn-outline-dark">My sessions to come</a>
                            </div>
                        </div>
                    </div>
                    @elseif (Auth::user()->role == "user")
                    <div class="card-header">You are : Employee</div>
                        <div class="card-body">
                            <div class="alert" role="alert">
                                <a href="{{ url('/trainings') }}" class="btn btn-outline-dark">Trainings</a> - <a href="{{ url('/passed_sessions') }}" class="btn btn-outline-dark">My passed sessions</a> - <a href="{{ url('/sessions_to_come') }}" class="btn btn-outline-dark">My sessions to come</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
