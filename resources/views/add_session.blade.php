@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a new session:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => ["create_session", $training->id]]) !!}
                        Name :{!! Form::text('name') !!}<br>
                        Date :{!! Form::date('date') !!}<br>
                        Available seats :{!! Form::text('availables_seats') !!}<br>
                        Configuration :{!! Form::select('configuration', ['0' => 'No', '1' => 'Yes']) !!}<br>
                        Room : {!! Form::select('room_id', $rooms->pluck('name', 'id')) !!}<br>
                        Teacher : {!! Form::select('teacher_id', $users->pluck('name', 'id')) !!}<br>
                        {!! Form::submit('Add a session') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
