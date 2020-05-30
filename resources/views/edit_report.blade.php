@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editer le compte-rendu de la session {{$report->session->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::model($report, ['route' => ['update_report', $report->id]]) !!}
                        Nom :{!! Form::text('name') !!}<br>
                        Description :<br>{!! Form::textarea('content') !!}<br>
                        {!! Form::submit('Update Report') !!}
                    {!! Form::close() !!}
                    <a href="{{ route('delete_report', $report->id) }}">Supprimer le compte-rendu</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
