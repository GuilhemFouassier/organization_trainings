@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update a User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::model($user, ['route' => ['update_user', $user->id]]) !!}
                        nom :{!! Form::text('name') !!}<br>
                        date de Naissance :{!! Form::date('date_of_birth') !!}<br>
                        gender :{!! Form::select('gender', ['male' => 'Masculin', 'female' => 'Feminin', 'other'=>'Autre']) !!}<br>
                        job :{!! Form::text('job') !!}<br>
                        email: {!! Form::email('email') !!}<br>
                        role :{!! Form::select('role', ['adm' => 'Admin', 'prof' => 'Professeur', 'user'=>'Salarié']) !!}<br>
                        {!! Form::submit('Edit user') !!}
                    {!! Form::close() !!}
                    <a href="{{ route('delete_user', $user->id) }}">Supprimer l'utilisateur</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
