@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <ul>
                @if (Auth::user()->role == "user")
                    @foreach ($sessions as $session)
                        @foreach( Auth::user()->grades as $grade )
                            @if($grade->session_id == $session ->id)
                                @if ($session->date < Carbon\Carbon::now())
                                    <p>Mes sessions passées:</p>
                                    <ul>
                                        <li> {{$session->name}} </li>
                                        <li> {{$session->date}} </li>
                                        <li> {{$session->availables_seats}} </li>
                                        <li> {{$session->configuration}} </li>
                                        <li> {{$session->room->name}} </li>
                                        <li> Professeur : {{$session->report->user->name}} </li>
                                        @if($session->report === null)
                                            <li><a href="">Créer un compte-rendu</a> </li>
                                        @else
                                            <li><a href="{{ route('report', $session->id) }}">Voir le compte-rendu</a></li>
                                        @endif
                                        @if (Auth::user()->role == "user")
                                            @if ($session->grades->isNotEmpty() & Auth::user()->grades->isNotEmpty())
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
                                        @endif
                                    </ul>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
