@extends('app')
@section('content')
    <div class="container text-center mt-5">
        <div class="row">
            <div class="col ">
                <form method="POST" action="">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Wpisz Imie i Nazwisko" name="search" >
                        <input class="btn btn-secondary" type="submit" value="Wyszukaj"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
            @foreach($leady as $lead)
                <a href="#">
                    <li class="list-group-item ">
                        <div class="container ">
                            <div class="row">
                                <div class="col-2 text-left">

                                </div>
                                <div class="col-4">
                                    <span class="form-check-label"></span>
                                </div>
                                <div class="col-3">
                                    <span class="form-check-label"></span>
                                </div>
                                <div class="col-3">
                                    <span class="form-check-label"></span>
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
