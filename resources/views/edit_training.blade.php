@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit a training</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::model($training, ['route' => ['update_training', $training->id]]) !!}
                        Name :{!! Form::text('name') !!}<br>
                        Duration :{!! Form::time('duration') !!}<br>
                        Teacher : {!! Form::select('teacher_id', $users->pluck('name', 'id')) !!}<br>
                        {!! Form::submit('Update the training') !!}
                    {!! Form::close() !!}
                    <a href="{{ route('delete_training', $training->id) }}">Delete the training</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
