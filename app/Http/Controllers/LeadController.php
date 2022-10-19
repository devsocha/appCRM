<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function lead(){
        $firmy = lead::where('id_firma_partner',1)->get();
        return view('app_leads',[
            'siteNameTittle' => 'Leady',
            'firmy'=> $firmy,
        ]);
    }
}
