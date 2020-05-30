@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Les Formations:</div>
                <div class="card-body">
                    @if (Auth::user()->role == "adm")
                    <a href="{{ route('add_training') }}">Créer une formation</a>
                    @endif
                    <ul>
                    @foreach ($trainings as $training)
                        @if (Auth::user()->role == "teacher" && $training->teacher_id == Auth::user()->id)
                        <li> {{$training->name}}
                            <ul>
                                <li> {{$training->duration}} </li>
                                <li> {{$training->user->name}} </li>
                                <li> <a href="{{ route('sessions', $training->id) }}">Voir toutes les sessions</a> </li>
                            </ul>
                        </li>
                        @elseif (Auth::user()->role == "adm" ||  Auth::user()->role == "user")
                        <li> {{$training->name}} - @if (Auth::user()->role == "adm") <a href="{{ route('edit_training', $training->id) }}">Editer la formation</a> @endif
                            <ul>
                                <li> {{$training->duration}} </li>
                                <li> {{$training->user->name}} </li>
                                <li> <a href="{{ route('sessions', $training->id) }}">Voir toutes les sessions</a> </li>
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
