@extends('app')
@section('content')
    @foreach($firmy as $firma)
        {{ $firma->nazwa }}
        {{ $firma->nip }}
        {{ $firma->nazwa }}
        {{ $firma->nazwa }}
        {{ $firma->nazwa }}
    @endforeach
@endsection
