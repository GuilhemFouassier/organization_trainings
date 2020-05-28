@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Les Sessions de la formation {{$training->name}}:</div>
            <div class="card-body">
                <a href="{{ route('add_session', $training->id) }}">Ajouter une nouvelle session</a>
                <ul>
                    @foreach ($sessions as $session)
                    <li> {{$session->name}}
                        <ul>
                            <li> {{$session->date}} </li>
                            <li> {{$session->availables_seats}} </li>
                            <li> {{$session->configuration}} </li>
                            <li> {{$session->room->name}} </li>
                            <li>Professeur : {{$session->report->user->name}} </li>
                            @if($session->report === null)
                                <li><a href="">Créer un compte-rendu</a> </li>
                            @else
                                <li><a href="{{ route('reports', $session->id) }}">Voir le compte-rendu</a></li>
                            @endif
                            
                            @if (Auth::user()->role == "user" & $session->grades->isNotEmpty() & Auth::user()->grades->isNotEmpty())
                                    @foreach( Auth::user()->grades as $grade )
                                        @if($grade->session_id == $session ->id)
                                            <li>Vous êtes déjà inscrit </li>
                                        @endif
                                    @endforeach
                            @else
                                @if ($session->availables_seats > 0)
                                    <li> <a href="{{route('registration', $session->id) }}"> Inscription </a> </li>
                                @else
                                    <li>Il n'y a plus de place</li>
                                @endif
                            @endif
                            </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
