@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Compte-rendu de la session {{$session->name}}:</div>
                <div class="card-body">
                    <ul>
                        <li>
                            <ul>
                                <li> {{$report->name}} </li>
                                <li> {{$report->content}} </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
