@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
        <div class="card-header">My passed sessions :</div>
            <div class="card-body">
                <ul class="list-group">
                @if (Auth::user()->role == "user")
                    @foreach ($sessions as $session)
                        @foreach( Auth::user()->grades as $grade )
                            @if($grade->session_id == $session ->id)
                                @if ($session->date < Carbon\Carbon::now())
                                    <li class="list-group-item"> {{$session->name}} ( {{$session->training->name}} )
                                    <ul>
                                        <li>Date : {{$session->date}} </li>
                                        <li>Number of remaining seats : {{$session->availables_seats}} </li>
                                        <li>Room : {{$session->room->name}} </li>
                                        <li>Teacher : {{$session->report->user->name}} </li>
                                        @if($session->report->content != null & $session->report->name != null)
                                            <li><a href="{{ route('report', $session->id) }}" class="btn btn-secondary btn-sm">See the report</a></li>
                                        @endif
                                        @if($grade->value == null)
                                            <li>You have no grades</li>
                                        @else
                                            <li>Your grade : {{ $grade->value }} / 20</li>
                                        @endif
                                    </ul>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                @elseif (Auth::user()->role == "teacher")
                    @foreach ($sessions as $session)
                            @if($session->report->teacher_id == Auth::user()->id)
                                @if ($session->date < Carbon\Carbon::now())
                                    <li class="list-group-item"> {{$session->name}} ( {{$session->training->name}} )
                                    <ul>
                                        <li>Date : {{$session->date}} </li>
                                        <li>Number of remaining seats : {{$session->availables_seats}} </li>
                                        <li>Room : {{$session->room->name}} </li>
                                        <li>Teacher : {{$session->report->user->name}} </li>
                                        @if($session->report->content == null & $session->report->name == null)
                                            <li><a href="{{ route('add_report', $session->report->id) }}" class="btn btn-primary btn-sm">Create a report</a> </li>
                                        @else
                                            <li><a href="{{ route('report', $session->id) }}" class="btn btn-primary btn-sm">See the report</a></li>
                                        @endif
                                        @if($session->grades->isNotEmpty())
                                            <li>
                                                Subscribed persons : 
                                                <ul>
                                                @foreach ($session->grades as $grade)
                                                    <li>{{ $grade->user->name }} 
                                                        @if( $grade->value == null )
                                                            <a href="{{ route('add_grade', $grade->id) }}" class="btn btn-secondary btn-sm">Give a grade</a>
                                                        @else
                                                            : {{$grade->value}} / 20 <a href="{{ route('edit_grade', $grade->id) }}" class="btn btn-outline-secondary btn-sm">Edit this grade</a>
                                                        @endif
                                                    </li>
                                                @endforeach
                                                </ul>
                                            </li>
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
