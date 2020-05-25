@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => "create_user"]) !!}
                        nom :{!! Form::text('name') !!}<br>
                        date de Naissance :{!! Form::date('date_of_birth') !!}<br>
                        gender :{!! Form::select('gender', ['male' => 'Masculin', 'female' => 'Feminin', 'other'=>'Autre']) !!}<br>
                        job :{!! Form::text('job') !!}<br>
                        email: {!! Form::email('email') !!}<br>
                        role :{!! Form::select('role', ['adm' => 'Admin', 'teacher' => 'Professeur', 'user'=>'Salarié']) !!}<br>
                        password :{!! Form::password('password') !!}<br>
                        {!! Form::submit('Add user') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
