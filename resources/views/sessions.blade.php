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
                                <li> {{$session->report->user->name}} </li>
                                <li> <a href="">Voir le compte-rendu</a> </li>
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
