@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit session {{$session->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::model($session, ['route' => ['update_session', $session->id]]) !!}
                        Name :{!! Form::text('name') !!}<br>
                        Date :{!! Form::date('date') !!}<br>
                        Available seats :{!! Form::text('availables_seats') !!}<br>
                        Configuration :{!! Form::select('configuration', ['0' => 'No', '1' => 'Yes']) !!}<br>
                        Room : {!! Form::select('room_id', $rooms->pluck('name', 'id')) !!}<br>
                        Teacher : {!! Form::select('teacher_id', $users->pluck('name', 'id')) !!}<br>
                        {!! Form::submit('Update the session') !!}
                    {!! Form::close() !!}
                    <a href="{{ route('delete_session', $session->id) }}">Delete the session</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
