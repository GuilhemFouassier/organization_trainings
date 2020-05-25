@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Les utilisateurs:</div>
                <div class="card-body">
                <a href="{{ route('add_user') }}">Ajoutez un utilisateur</a><br>
                    Tous les utilisateurs:
                    <ul>
                    @foreach ($users as $user)
                        <li> {{$user->name}} ( {{$user->role}} ) - <a href="{{ route('edit_user', $user->id) }}">Edit</a>
                            <ul>
                                <li>Email : {{$user->email}}</li>
                                <li>Date Of Birth : {{$user->date_of_birth}}</li>
                                <li>Gender : {{$user->gender}}</li>
                                <li>Job : {{$user->job}}</li>
                            </ul>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
