@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$report->session->name}}'s report</div>
                <div class="card-body">
                    <ul>
                        <li> {{$report->name}}
                            <ul>
                                <li> {{$report->content}} </li>
                            </ul>
                        </li>
                    </ul>
                    @if(Auth::user()->role == "teacher")
                        <div><a href="{{ route('edit_report', $report->id) }}">Edit the report</a></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
