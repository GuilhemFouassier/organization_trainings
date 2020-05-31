@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
        <div class="card-header">Mes sessions passées:</div>
            <div class="card-body">
                <ul>
                @if (Auth::user()->role == "user")
                    @foreach ($sessions as $session)
                        @foreach( Auth::user()->grades as $grade )
                            @if($grade->session_id == $session ->id)
                                @if ($session->date < Carbon\Carbon::now())
                                    <li> {{$session->name}} </li>
                                    <ul>
                                        <li>Date : {{$session->date}} </li>
                                        <li>Nombre de places restantes : {{$session->availables_seats}} </li>
                                        <li>Salle : {{$session->room->name}} </li>
                                        <li>Professeur : {{$session->report->user->name}} </li>
                                        @if($session->report->content != null & $session->report->name != null)
                                            <li><a href="{{ route('report', $session->id) }}" class="btn btn-outline-secondary btn-sm">Voir le compte-rendu</a></li>
                                        @endif
                                        @if($grade->value == null)
                                            <li>Vous n'avez pas de note</li>
                                        @else
                                            <li>Votre note : {{ $grade->value }} / 20</li>
                                        @endif
                                    </ul>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                @elseif (Auth::user()->role == "teacher")
                    @foreach ($sessions as $session)
                            @if($session->report->teacher_id == Auth::user()->id)
                                @if ($session->date < Carbon\Carbon::now())
                                    <li> {{$session->name}} </li>
                                    <ul>
                                        <li>Date : {{$session->date}} </li>
                                        <li>Nombre de places restantes : {{$session->availables_seats}} </li>
                                        <li>Salle : {{$session->room->name}} </li>
                                        <li>Professeur : {{$session->report->user->name}} </li>
                                        @if($session->report->content == null & $session->report->name == null)
                                            <li><a href="" class="btn btn-outline-info btn-sm">Créer un compte-rendu</a> </li>
                                        @else
                                            <li><a href="{{ route('report', $session->id) }}" class="btn btn-outline-info btn-sm">Voir le compte-rendu</a></li>
                                        @endif
                                        @if($session->grades->isNotEmpty())
                                            <li>
                                                Les personnes inscrites : 
                                                <ul>
                                                @foreach ($session->grades as $grade)
                                                    <li>{{ $grade->user->name }} 
                                                        @if( $grade->value == null )
                                                            <a href="{{ route('add_grade', $grade->id) }}" class="btn btn-outline-secondary btn-sm">Mettre une note</a>
                                                        @else
                                                            : {{$grade->value}} / 20 <a href="{{ route('edit_grade', $grade->id) }}" class="btn btn-outline-secondary btn-sm">Editer cette note</a>
                                                        @endif
                                                    </li>
                                                @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            @endif
                    @endforeach
                @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
