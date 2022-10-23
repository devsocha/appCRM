@extends('app')
@section('content'):
    <div class="container text-center mt-5">
        <div class="row">
            <div class="col">
                <a href="{{Route('app_add_lead')}}">
                    <button type="button" class="btn btn-secondary">Dodaj Firmę</button>
                </a>
            </div>
            <div class="col">
                <form method="POST" action="{{Route('searchCompany')}}">
                    @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Wpisz nazwę lub NIP" name="search" >
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
                        <span class="form-check-label"><strong>Nazwa firmy</strong></span>
                    </div>
                    <div class="col-3">
                        <span class="form-check-label"><strong>Nip</strong></span>
                    </div>
                    <div class="col-3">
                        <span class="form-check-label"><strong>Miejscowość</strong></span>
                    </div>
                </div>
            </div>
        </li>
        @foreach($firmy as $firma)

            <a href="{{Route('companyShow',['id'=>$firma->company->id_firma])}}">
                <li class="list-group-item ">
                    <div class="container ">
                        <div class="row">
                            <div class="col-2 text-left">
                                {{$loop->iteration}}.
                            </div>
                            <div class="col-4">
                                <span class="form-check-label">{{ $firma->company->nazwa }}</span>
                            </div>
                            <div class="col-3">
                                <span class="form-check-label">{{ $firma->company->nip }}</span>
                            </div>
                            <div class="col-3">
                                <span class="form-check-label">{{ $firma->company->miasto }}</span>
                            </div>
                        </div>
                    </div>
                </li>
            </a>
        @endforeach
    </ul>

</div>
<div class="container text-center">
    @for($i=1;$i<=$ilość;$i++)
        <a href="{{Route('app_leads',['nr'=>$i])}}">{{$i}}</a>
    @endfor
</div>

@endsection
