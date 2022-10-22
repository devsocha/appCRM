<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\lead;
use App\Models\userfirma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    public function lead(){
        $id_usera = Auth::user()->id;
        $id_firmy = userfirma::where('id_osoba',$id_usera)->first();
        $id_company = $id_firmy->id_firma;
        $firmy = lead::where('id_firma_partner',$id_company)->get();
        return view('app_leads',[
            'siteNameTittle' => 'Leady',
            'firmy'=> $firmy,
        ]);
    }
}
