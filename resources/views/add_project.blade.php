@extends('app')
@section('content')
    <div class="card m-5">
        <form method="post" action="{{route('addProjectDb',['id'=>$idFirma])}}">
            @csrf
            <h5 class="card-header">
                <strong>Tytuł: </strong><input type-="text" name="nazwa" placeholder="Przykładowy tytuł" required />

            </h5>

            <div class="card-body">
                <h5 class="card-title"><strong>Opis: </strong><input type-="text" name="opis" placeholder="Przykładowy opis 123" required /></h5>
                <h5 class="card-title"><strong>Kwota netto: </strong> <input type-="number" name="kwotaNetto" placeholder="12221" required/> </h5></br>
                <p class="card-text"><strong>Przypisz handlowca:  </strong>
                    <select name="osoba" >
                        <option>W swoim imieniu</option>

                        @foreach($handlowcy as $handlowiec)
                            <option value="{{$handlowiec->user->id}}">{{$handlowiec->user->name}}</option>
                        @endforeach
                    </select>
                </p>
                <input type="submit" class="btn btn-secondary" name="addProject" value="Dodaj projekt"/>
                <a href="{{Route('companyShow',['id'=>$idFirma])}}" class="btn btn-danger">Cofnij</a>
            </div>
        </form>
    </div>
@endsection

