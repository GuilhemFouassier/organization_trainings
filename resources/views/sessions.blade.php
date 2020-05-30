@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Les Sessions de la formation {{$training->name}}:</div>
            <div class="card-body">
                @if (Auth::user()->role == "adm")
                    <a href="{{ route('add_session', $training->id) }}">Ajouter une nouvelle session</a>
                @endif
                <ul>
                    @if (Auth::user()->role == "adm" || Auth::user()->role == "teacher")
                        @foreach ($sessions as $session)
                        <li> {{$session->name}}
                            <ul>
                                <li>Date: {{$session->date}} </li>
                                <li>Salle : {{$session->room->name}} </li>
                                <li>Professeur : {{$session->report->user->name}} </li>
                                @if (Auth::user()->role == "adm")
                                <li><a href="{{ route('edit_session', $session->id) }}">Editer la session</a></li>
                                @endif
                                @if($session->report->content == null & $session->report->name == null)
                                    @if(Auth::user()->role == "teacher")
                                        <li><a href="{{ route('add_report', $session->report->id) }}">Créer un compte-rendu</a> </li>
                                    @endif
                                @else
                                    <li><a href="{{ route('report', $session->report->id) }}">Voir le compte-rendu</a></li>
                                @endif
                            </ul>
                        </li>
                        @endforeach
                    @elseif (Auth::user()->role == "user")
                        @foreach ($sessions as $session)
                            @if ($session->date > Carbon\Carbon::now())
                                <li> {{$session->name}}
                                    <ul>
                                        <li>Date : {{$session->date}} </li>
                                        <li>Salle : {{$session->room->name}} </li>
                                        <li>Professeur : {{$session->report->user->name}} </li>
                                        @if (Auth::user()->role == "adm")
                                        <li><a href="{{ route('edit_session', $session->id) }}">Editer la session</a></li>
                                        @endif
                                        @if($session->report->content == null & $session->report->name == null)
                                            @if(Auth::user()->role == "teacher")
                                                <li><a href="{{ route('add_report', $session->report->id) }}">Créer un compte-rendu</a> </li>
                                            @endif
                                        @else
                                            <li><a href="{{ route('report', $session->report->id) }}">Voir le compte-rendu</a></li>
                                        @endif
                                        @if (Auth::user()->role == "user" & $session->grades->isNotEmpty())
                                            @php( $existance = 0 )
                                            @for ($i = 0; $i < count($session->grades); $i++)
                                                @if ($session->grades[$i]->user_id == Auth::user()->id)
                                                    @php( $existance = 1 )
                                                @endif
                                            @endfor
                                            @if( $existance === 1 )
                                                <li>{{$session->availables_seats}} places restantes : Vous êtes déjà inscrits</li>
                                            @else
                                                @if ($session->availables_seats > 0)
                                                    <li>{{$session->availables_seats}} places restantes : <a href="{{route('registration', $session->id) }}"> Inscription </a> </li>
                                                @else
                                                    <li>{{$session->availables_seats}} place restante : Vous ne pouvez plus vous inscrire</li>
                                                @endif
                                            @endif
                                        @elseif ( Auth::user()->role == "user" )
                                                @if ($session->availables_seats > 0)
                                                    <li>{{$session->availables_seats}} places restantes :  <a href="{{route('registration', $session->id) }}"> Inscription </a> </li>
                                                @else
                                                    <li>{{$session->availables_seats}} place restante : Vous ne pouvez plus vous inscrire</li>
                                                @endif
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
