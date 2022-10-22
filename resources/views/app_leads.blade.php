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
                <button type="button" class="btn btn-secondary">Wyszukaj Firmę</button>
            </div>
        </div>
    </div>
    <ul class="list-group m-5">
    @foreach($firmy as $firma)
            <a href="{{Route('companyShow',['id'=>$firma->company->id_firma])}}"><li class="list-group-item">
                <span class="form-check-label">{{ $firma->company->nazwa }}</span>
            </li></a>
    @endforeach
    </ul>
@endsection
