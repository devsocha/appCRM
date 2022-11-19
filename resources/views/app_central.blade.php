@extends('app')
@section('content')
<div class="container text-center mt-5 p-5">
    <div class="row mb-5">
        <div class="col" style="border:1px grey solid; border-radius:15px;">
            <div>
                   <span style="font-size:30px; ">
                    Obrót netto (30dni)</br></br></br>
                    </span>
            </div>
            <div>
                <span style="font-size:30px">
                   <strong> {{$obrotNetto}} zł </strong>
                </span>
            </div>
        </div>
        <div class="col " style="border:1px grey solid; margin-left:2px;border-radius:15px;">
            <div>
                   <span style="font-size:30px">
                   Największy zakończony kontrakt (30dni)</br></br>
                    </span>
            </div>
            <div>
                <span style="font-size:30px; ">
                    <strong>{{$maxContract}} zł</strong></br></br></br>
                </span>
            </div>
        </div>
        <div class="col" style="border:1px grey solid; margin-left:2px;border-radius:15px;">

                <div>
                   <span style="font-size:30px">
                       Suma wszystkich trwających kontraktów (30dni)
                    </span></br></br></br>
                    <div style="font-size:30px; ">
                        <strong> {{$statsContractsInCase}} </strong>
                    </div>
                </div>
            </div>
        </div>
    <div class="row mb-5">
        <div class="col" style="border:1px grey solid; border-radius:15px;">
            <div>
                   <span style="font-size:30px; ">
                    Ilość nowych leadów (30dni)</br></br></br>
                    </span>
            </div>
            <div>
                <span style="font-size:30px">
                   <strong> {{$newLeads}} </strong>
                </span>
            </div>
        </div>
        <div class="col " style="border:1px grey solid; margin-left:2px;border-radius:15px;">
            <div>
                   <span style="font-size:30px">
                   Ilość finalizacji (30dni)</br></br></br>
                    </span>
            </div>
            <div>
                <span style="font-size:30px; ">
                    <strong>{{$monthEnd}}</strong></br></br></br>
                </span>
            </div>
        </div>
        <div class="col" style="border:1px grey solid; margin-left:2px;border-radius:15px;">

            <div>
                   <span style="font-size:30px; ">
                       Ilość nowych kontraktów(30dni)</br></br>
                    </span>
                <div style="font-size:30px; ">
                    <strong>{{$ileLead}}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
