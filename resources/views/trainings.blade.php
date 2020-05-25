@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Les Formations:</div>
                <a href="{{ route('add_training') }}">Créer une formation</a>
                <div class="card-body">
                    <ul>
                    @foreach ($trainings as $training)
                        <li> {{$training->name}} - @if (Auth::user()->role == "adm") <a href="{{ route('edit_training', $training->id) }}">Editer la formation</a> @endif
                            <ul>
                                <li> {{$training->duration}} </li>
                                <li> {{$training->user->name}} </li>
                                <li> <a href="">Voir toutes les sessions</a> </li>
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
