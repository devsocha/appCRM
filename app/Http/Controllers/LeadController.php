<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\lead;
use App\Models\userfirma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    public function pobierzFirme(){
        $id_usera = Auth::user()->id;
        $id_firmy = userfirma::where('id_osoba',$id_usera)->first();
        $id_company = $id_firmy->id_firma;
        return $id_company;
    }

    public function lead(){
        $id_company = $this->pobierzFirme();
        $firmy = lead::where('id_firma_partner',$id_company)->get();
        return view('app_leads',[
            'siteNameTittle' => 'Leady',
            'firmy'=> $firmy,
        ]);
    }
    public function addLead(){
        $id_company = $this->pobierzFirme();
    }
}
