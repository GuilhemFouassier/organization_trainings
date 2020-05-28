@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Compte-rendu de la session {{$session->name}}:</div>
                <div class="card-body">
                    @foreach ($reports as $report)
                        <li> {{$report->name}}
                            <ul>
                                <li> {{$report->content}} </li>
                            </ul>
                        </li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
