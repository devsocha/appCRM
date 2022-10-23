@extends('app')
@section('content')
    <div class="card m-5">
        <form method="post" action="{{route('addCompany')}}">
            @csrf
            <h5 class="card-header"><strong>Nazwa firmy: </strong><input type-="text" name="nazwaFirmy" required /></h5>
            <div class="card-body">
                <h5 class="card-title"><strong>NIP: </strong><input type-="number" name="nipFirmy" required /></h5>
                <h5 class="card-title"><strong>Branża: </strong> <input type-="text" name="branzaFirmy" required/> </h5></br>

                <p class="card-text"><strong>Adres siedziby: </strong><input type-="text" name="adresFirmy" required/> </p>
                <p class="card-text"><strong>Kod pocztowy: </strong><input type-="text" name="kodPocztowyFirmy" required/></p>
                <p class="card-text"><strong>Miejscowość: </strong><input type-="text" name="miejscowoscFirmy" required/></p>
                <input class="btn btn-secondary" type="submit" name="addCompany" value="Dodaj firmę">
                <a href="{{Route('app_leads',['nr'=>1])}}" class="btn btn-danger">Cofnij</a>
            </div>
        </form>

    </div>
@endsection
