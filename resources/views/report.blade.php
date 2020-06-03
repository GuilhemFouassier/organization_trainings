@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$report->session->name}}'s report</div>
                <div class="card-body">
                        <h1>{{$report->name}}</h1>
                                <p> {{$report->content}} </p>
                    @if(Auth::user()->role == "teacher")
                    <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                            <a href="{{ route('edit_report', $report->id) }}" class="btn btn-primary">Edit the report</a>
                            </div>
                        </div>
                    @endif
                </div>
            </>
        </div>
    </div>
    </div>
@endsection
