@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
        <div class="card-header">My sessions to come :</div>
            <div class="card-body">
                <ul>
                @if (Auth::user()->role == "user")
                    @foreach ($sessions as $session)
                        @foreach( Auth::user()->grades as $grade )
                            @if($grade->session_id == $session ->id)
                                @if ($session->date > Carbon\Carbon::now())
                                <li> {{$session->name}} ( {{$session->training->name}} )</li>    
                                        <ul>
                                            <li>Date : {{$session->date}} </li>
                                            <li>Number of remaining seats : {{$session->availables_seats}} </li>
                                            <li>Room : {{$session->room->name}} </li>
                                            <li>Teacher : {{$session->report->user->name}} </li>
                                        </ul>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                @elseif (Auth::user()->role == "teacher")
                    @foreach ($sessions as $session)
                            @if($session->report->teacher_id == Auth::user()->id)
                                @if ($session->date > Carbon\Carbon::now())
                                <li> {{$session->name}} ( {{$session->training->name}} )</li>    
                                        <ul>
                                            <li>Date : {{$session->date}} </li>
                                            <li>Number of remaining seats : {{$session->availables_seats}} </li>
                                            <li>Room : {{$session->room->name}} </li>
                                            <li>Teacher : {{$session->report->user->name}} (yourself) </li>
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
