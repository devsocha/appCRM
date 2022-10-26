@extends('app')
@section('content')
    <div class="card m-5">
        <form method="post" action="{{Route('editContactDb',['id'=>$id,'idLead'=>$idLead])}}">
            @csrf
            <h5 class="card-header">
                <strong>Imie: </strong><input type-="text" name="name"value="{{$osoba->imie}}" placeholder="Jan" required />
                <strong> Nazwisko: </strong><input type-="text" name="secoundName"value="{{$osoba->nazwisko}}" placeholder="Kowalski" required />
            </h5>

            <div class="card-body">
                <h5 class="card-title"><strong>Numer telefonu: </strong><input type-="number" name="phone" value="{{$osoba->numer_telefonu}}" placeholder="333222111" required /></h5>
                <h5 class="card-title"><strong>Email: </strong> <input type-="text" name="mail" placeholder="example@example.pl"value="{{$osoba->email}}" required/> </h5></br>
                <p class="card-text"><strong>Godziny pracy: </strong> {{$osoba->godziny_pracy}}
                    <input type-="text" name="hod" placeholder="8" required/> -
                    <input type-="text" name="hdo" placeholder="16" required/>
                </p>
                <p class="card-text"><strong>Dział: </strong><input type-="text" name="dzial" placeholder="Example"value="{{$osoba->dział}}" required/> </p>
                <p class="card-text"><strong>Stanowisko: </strong><input type-="text" name="stanowisko" placeholder="Example" value="{{$osoba->stanowisko}}" required/></p>
                <p class="card-text"><strong>Miejscowość: </strong><input type-="text" name="city" placeholder="Example City" value="{{$osoba->miejscowość}}"required/></p>
                <input class="btn btn-secondary" type="submit" name="addCompany" value="Edytuj osobe">
                <a href="{{Route('companyShow',['id'=>$osoba->id_firma])}}" class="btn btn-danger">Cofnij</a>
            </div>
        </form>

    </div>
@endsection
