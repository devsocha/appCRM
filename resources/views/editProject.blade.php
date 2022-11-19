@extends('app')
@section('content')
    <div class="card m-5">
        <form method="post" action="{{route('editProjectDb',['idproject'=>$project->id_projekt])}}">
            @csrf
            <h5 class="card-header">
                <strong>Tytuł: </strong><input type-="text" name="nazwa" value="{{$project->nazwa}}" placeholder="Przykładowy tytuł" required />

            </h5>

            <div class="card-body">
                <h5 class="card-title"><strong>Status:  </strong>
                <select name="rodzaj">
                    <option>{{$project->rodzaj}}</option>
                    <option>nowy</option>
                    <option>w trakcie</option>
                    <option>zakończony</option>
                </select>
                </h5></br>
                <p class="card-text"><strong>Kwota netto: </strong><input type-="text" name="kwotaNetto" placeholder="10000" value="{{$project->kwota_netto}}" required/> zł </p>
                <p class="card-text"><strong>Handlowiec: </strong><select name="osoba" >
                        <option value="{{$handlowiecPrzypisany->id}}">{{$handlowiecPrzypisany->name}}</option>

                        @foreach($handlowcy as $handlowiec)
                            <option value="{{$handlowiec->user->id}}">{{$handlowiec->user->name}}</option>
                        @endforeach
                    </select></p>
                <p class="card-text"><strong>Opis: </strong><input style="width:400px;height: 50px" type-="text" name="opis" placeholder="Przykładowy opis projektu" value="{{$project->opis}}"required/></p>
                <input class="btn btn-secondary" type="submit" name="editProject" value="Edytuj projekt">
                <a href="{{Route('companyShow',['id'=>$idFirma])}}" class="btn btn-danger">Cofnij</a>
            </div>
        </form>

    </div>
@endsection
