@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users :</div>
                <div class="card-body">
                <a href="{{ route('add_user') }}">Add a user</a><br>
                    All users :
                    <ul>
                    @foreach ($users as $user)
                        <li> {{$user->name}} ( {{$user->role}} ) - <a href="{{ route('edit_user', $user->id) }}">Edit</a>
                            <ul>
                                <li>Email : {{$user->email}}</li>
                                <li>Birth date : {{$user->date_of_birth}}</li>
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
