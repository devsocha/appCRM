<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function lead(){
        $firmy = company::get();

        return view('app_leads',[
            'siteNameTittle' => 'Leady',
            'firmy'=> $firmy,
        ]);
    }
}
