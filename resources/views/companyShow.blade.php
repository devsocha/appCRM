@extends('app')
@section('content')
    <div class="card m-5">
        <h5 class="card-header"><strong>Nazwa firmy: </strong>{{$firmy->nazwa}}</h5>
        <div class="card-body">
            <h5 class="card-title"><strong>NIP:</strong> {{$firmy->nip}} </h5>
            <h5 class="card-title"><strong>Branża: </strong> {{$firmy->usługi}} </h5></br>

            <p class="card-text"><strong>Adres siedziby:</strong> {{$firmy->ulica}}</p>
            <p class="card-text"><strong>Kod pocztowy: </strong>{{$firmy->kod_pocztowy}}</p>
            <p class="card-text"><strong>Miejscowość: </strong>{{$firmy->miasto}}</p>
            <a href="#" class="btn btn-secondary">Dodaj Kontakt </a>
            <a href="#" class="btn btn-secondary">Dodaj Projekt </a>
            <a href="{{Route('removeCompany',['id'=>$firmy->id_firma])}}" class="btn btn-danger">Usuń</a>
            <a href="{{Route('app_leads',['nr'=>1])}}" class="btn btn-dark">Cofnij </a>
        </div>
    </div>
    <div class="container text-center mt-5">
        <div class="row">
            <div class="col">
                <div class="card m-5">
                    <h5 class="card-header"><strong>Projekty</strong></h5>
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card m-5">
                    <h5 class="card-header"><strong>Kontakty</strong></h5>

                        <ul class="list-group">
                            <li class="list-group-item ">
                                        <div class="row ">
                                            <div class="col-2 text-left">
                                                <strong>#</strong>
                                            </div>
                                            <div class="col-4">
                                                <span class="form-check-label"><strong>Nazwa firmy</strong></span>
                                            </div>
                                            <div class="col-3">
                                                <span class="form-check-label"><strong>Nip</strong></span>
                                            </div>
                                            <div class="col-3">
                                                <span class="form-check-label"><strong>Miejscowość</strong></span>
                                            </div>
                                        </div>
                            </li>
                        @foreach($kontakty as $kontakt)
                           <a href="{{Route('showContacts',['id_osoba'=> $kontakt->osoba->id_osoba , 'id_leada'=>$kontakt->id_lead])}}">
                            <li class="list-group-item ">
                                    <div class="row">
                                        <div class="col-2 text-left">
                                            {{$loop->iteration}}.
                                        </div>
                                        <div class="col-4">
                                            <span class="form-check-label">{{$kontakt->osoba->imie}}</span>
                                        </div>
                                        <div class="col-3">
                                            <span class="form-check-label">{{$kontakt->osoba->nazwisko}}</span>
                                        </div>
                                        <div class="col-3">
                                            <span class="form-check-label">{{$kontakt->osoba->numer_telefonu}}</span>
                                        </div>
                                    </div>

                            </li></a>
                        @endforeach
                        </ul>

                </div>
            </div>
        </div>
    </div>


@endsection
