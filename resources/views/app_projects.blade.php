@extends('app')
@section('content')

    <div class="container">
        <ul class="list-group m-5">
            <li class="list-group-item active">
                <div class="container ">
                    <div class="row ">
                        <div class="col-2 text-left">
                            <strong>#</strong>
                        </div>
                        <div class="col-4">
                            <span class="form-check-label"><strong>Tytuł</strong></span>
                        </div>
                        <div class="col-3">
                            <span class="form-check-label"><strong>Kwota netto</strong></span>
                        </div>
                        <div class="col-3">
                            <span class="form-check-label"><strong>Status</strong></span>
                        </div>
                    </div>
                </div>
            </li>
            @foreach($projects as $project)
                <a href="#">
                    <li class="list-group-item ">
                        <div class="container ">
                            <div class="row">
                                <div class="col-2 text-left">
                                    {{$loop->iteration}}.
                                </div>
                                <div class="col-4">
                                    <span class="form-check-label">{{$project->project->nazwa}}</span>
                                </div>
                                <div class="col-3">
                                    <span class="form-check-label">{{$project->project->kwota_netto}} zł</span>
                                </div>
                                <div class="col-3">
                                    <span class="form-check-label">{{$project->project->rodzaj}}</span>
                                </div>
                            </div>
                        </div>
                    </li>
                </a>
            @endforeach
        </ul>

    </div>
    <div class="container text-center">
        @for($i=1;$i<=1;$i++)
            <a href="#">{{$i}}</a>
        @endfor
    </div>

@endsection
