@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a grade to {{ $grade[0]->user->name }} for {{ $grade[0]->session->name }}'s session </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(['url' => ["create_grade", $grade[0]->id]]) !!}
                        Grade ( / 20 ) : {!! Form::number('value') !!}<br>
                        {!! Form::submit('Add a grade') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
