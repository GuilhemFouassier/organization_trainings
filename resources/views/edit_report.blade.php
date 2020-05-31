@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit {{$report->session->name}}'s report</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::model($report, ['route' => ['update_report', $report->id]]) !!}
                        Name :{!! Form::text('name') !!}<br>
                        Description :<br>{!! Form::textarea('content') !!}<br>
                        {!! Form::submit('Update the report') !!}
                    {!! Form::close() !!}
                    <a href="{{ route('delete_report', $report->id) }}">Delete the report</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
