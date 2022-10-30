@extends('app')
@section('content')
<div class="card m-5">
    <h5 class="card-header"><strong>Imie Nazwisko: </strong>{{$osoba->imie}} {{$osoba->nazwisko}}</h5>
    <div class="card-body">
        <h5 class="card-title"><strong>Numer telefonu: </strong>{{$osoba->numer_telefonu}}  </h5>
        <h5 class="card-title"><strong>Email: </strong>{{$osoba->email}} </h5></br>
        <p class="card-text"><strong>Dział: </strong>{{$osoba->dział}}</p>
        <p class="card-text"><strong>Stanowisko: </strong>{{$osoba->stanowisko}} </p>
        <p class="card-text"><strong>Miejscowość: </strong>{{$osoba->miejscowość}}</p>
        <a href="{{Route('editContact',['id'=>$osoba->id_osoba,'idLead'=>$idLeada])}}" class="btn btn-secondary">Edytuj kontakt </a>
        <a href="{{Route('deleteContact',['id'=>$osoba->id_osoba])}}" class="btn btn-danger">Usuń</a>
        <a href="{{Route('companyShow',['id'=>$osoba->id_firma])}}" class="btn btn-dark">Cofnij </a>
    </div>
</div>
@endsection
