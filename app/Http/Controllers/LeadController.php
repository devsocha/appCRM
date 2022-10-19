<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function lead(){
        $firmy = lead::get();
        return view('app_leads',[
            'siteNameTittle' => 'Leady',
            'firmy'=> $firmy,
        ]);
    }
}
