@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a new training</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => "create_training"]) !!}
                        Name :{!! Form::text('name') !!}<br>
                        Duration :{!! Form::time('duration') !!}<br>
                        Teacher : {!! Form::select('teacher_id', $users->pluck('name', 'id')) !!}<br>
                        {!! Form::submit('Add a training') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
