@extends('app')
@section('content')
    <ul class="list-group m-5">
    @foreach($firmy as $firma)
            <a href="{{Route('companyShow',['id'=>$firma->id_firma])}}"><li class="list-group-item">
                <span class="form-check-label">{{ $firma->nazwa }}</span>
            </li></a>
    @endforeach
    </ul>
@endsection
