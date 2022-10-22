@extends('app')
@section('content')
    <div class="card m-5">
        <form>
            <h5 class="card-header"><strong>Nazwa firmy: </strong><input type-="text" name="nazwaFirmy" /></h5>
            <div class="card-body">
                <h5 class="card-title"><strong>NIP: </strong><input type-="number" name="nazwaFirmy" /></h5>
                <h5 class="card-title"><strong>Branża: </strong> <input type-="text" name="nazwaFirmy" /> </h5></br>

                <p class="card-text"><strong>Adres siedziby: </strong><input type-="text" name="nazwaFirmy" /> </p>
                <p class="card-text"><strong>Kod pocztowy: </strong><input type-="text" name="nazwaFirmy" /></p>
                <p class="card-text"><strong>Miejscowość: </strong><input type-="text" name="nazwaFirmy" /></p>
                <a href="#" class="btn btn-secondary">Dodaj firmę </a>
                <a href="#" class="btn btn-danger">Cofnij</a>
            </div>
        </form>

    </div>
@endsection
