@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{$training->name}}'s sessions</div>
            <div class="card-body">
                @if (Auth::user()->role == "adm")
                    <a href="{{ route('add_session', $training->id) }}" class="btn btn-info">Add a new session</a>
                @endif
                <ul class="list-group">
                    @if (Auth::user()->role == "adm" || Auth::user()->role == "teacher")
                        @foreach ($sessions as $session)
                        <li class="list-group-item"> {{$session->name}}
                            <ul>
                                <li>Date: {{$session->date}} </li>
                                <li>Room : {{$session->room->name}} </li>
                                <li>Teacher : {{$session->report->user->name}} </li>
                                @if (Auth::user()->role == "adm")
                                <li><a href="{{ route('edit_session', $session->id) }}" class="btn btn-primary btn-sm">Edit the session</a></li>
                                @endif
                                @if($session->report->content == null & $session->report->name == null)
                                    @if(Auth::user()->role == "teacher")
                                        <li><a href="{{ route('add_report', $session->report->id) }}" class="btn btn-primary btn-sm">Create a report</a> </li>
                                    @endif
                                @else
                                    <li><a href="{{ route('report', $session->report->id) }}" class="btn btn-primary btn-sm">See the report</a></li>
                                @endif
                            </ul>
                        </li>
                        @endforeach
                    @elseif (Auth::user()->role == "user")
                        @foreach ($sessions as $session)
                            @if ($session->date > Carbon\Carbon::now())
                                <li class="list-group-item"> {{$session->name}}
                                    <ul>
                                        <li>Date : {{$session->date}} </li>
                                        <li>Room : {{$session->room->name}} </li>
                                        <li>Teacher : {{$session->report->user->name}} </li>
                                        @if($session->report->content == null & $session->report->name == null)
                                            @if(Auth::user()->role == "teacher")
                                                <li><a href="{{ route('add_report', $session->report->id) }}" class="btn btn-primary btn-sm">Create a report</a> </li>
                                            @endif
                                        @else
                                            <li><a href="{{ route('report', $session->report->id) }}" class="btn btn-primary btn-sm">See the report</a></li>
                                        @endif
                                        @if (Auth::user()->role == "user" & $session->grades->isNotEmpty())
                                            @php( $existance = 0 )
                                            @for ($i = 0; $i < count($session->grades); $i++)
                                                @if ($session->grades[$i]->user_id == Auth::user()->id)
                                                    @php( $existance = 1 )
                                                @endif
                                            @endfor
                                            @if( $existance === 1 )
                                                <li>{{$session->availables_seats}} available seats : You are already subscribed</li>
                                            @else
                                                @if ($session->availables_seats > 0)
                                                    <li>{{$session->availables_seats}} available seats : <a href="{{route('registration', $session->id) }}" class="btn btn-primary btn-sm"> Subscribe </a> </li>
                                                @else
                                                    <li>{{$session->availables_seats}} available seats : You can't subscribe</li>
                                                @endif
                                            @endif
                                        @elseif ( Auth::user()->role == "user" )
                                                @if ($session->availables_seats > 0)
                                                    <li>{{$session->availables_seats}} available seats :  <a href="{{route('registration', $session->id) }}"  class="btn btn-primary btn-sm"> Subscribe </a> </li>
                                                @else
                                                    <li>{{$session->availables_seats}} available seats : You can't subscribe</li>
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
