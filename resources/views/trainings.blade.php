@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Trainings :</div>
                <div class="card-body">
                    @if (Auth::user()->role == "adm")
                    <a href="{{ route('add_training') }}" class="btn btn-info">Create a training</a>
                    @endif
                    <ul class="list-group">
                    @foreach ($trainings as $training)
                        @if (Auth::user()->role == "teacher" && $training->teacher_id == Auth::user()->id)
                        <li class="list-group-item"> {{$training->name}}
                            <ul>
                                <li> Duration : {{$training->duration}} </li>
                                <li> In charge : {{$training->user->name}} </li>
                                <li> <a href="{{ route('sessions', $training->id) }}" class="btn btn-primary btn-sm">See all sessions</a> </li>
                            </ul>
                        </li>
                        @elseif (Auth::user()->role == "adm" ||  Auth::user()->role == "user")
                        <li class="list-group-item"> {{$training->name}} - @if (Auth::user()->role == "adm") <a href="{{ route('edit_training', $training->id) }}" class="btn btn-secondary btn-sm">Edit the training</a> @endif
                            <ul>
                                <li> Duration : {{$training->duration}} </li>
                                <li> In charge : {{$training->user->name}} </li>
                                <li> <a href="{{ route('sessions', $training->id) }}" class="btn btn-primary btn-sm">See all sessions</a> </li>
                            </ul>
                        </li>
                        @endif
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
