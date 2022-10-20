<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    public function lead(){
        $id_partnera = Auth::user()->id();
        $firmy = lead::where('id_firma_partner',$id_partnera)->get();
        return view('app_leads',[
            'siteNameTittle' => 'Leady',
            'firmy'=> $firmy,
        ]);
    }
}
