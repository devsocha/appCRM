@extends('app')
@section('content')
    <div class="card m-5">
        <h5 class="card-header"><strong>Tytuł: </strong>{{$projekt->project->nazwa}}</h5>
        <div class="card-body">
            <h5 class="card-title"><strong>Kwota netto: </strong>{{$projekt->project->kwota_netto}} zł</h5>
            <h5 class="card-title"><strong>Status: </strong> {{$projekt->project->rodzaj}}</h5></br>
            <p class="card-text"><strong>Przypisany handlowiec: {{$handlowiec->name}}</strong></p>
            <p class="card-text"><strong>Opis: {{$projekt->project->opis}}</strong></p>
            <a href="#" class="btn btn-secondary">Edytuj Projekt </a>
            <a href="{{route('deleteProject',['idproject'=>$projekt->id_project,'idfirma'=>$projekt->lead->id_firma])}}" class="btn btn-danger">Usuń</a>
            <a href="{{Route('companyShow',['id'=>$projekt->lead->id_firma])}}" class="btn btn-dark">Cofnij </a>
        </div>
    </div>
@endsection
