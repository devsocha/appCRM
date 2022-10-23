<?php

namespace App\Http\Controllers;

use App\Models\lead;
use App\Models\Osoba;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showContacts($id_osoba, $id_lead){
        $company = new LeadController();
        $idCompanyPartner = $company->pobierzFirme();
        $checkExists = lead::where('id_lead',$id_lead)->where('id_firma_partner',$idCompanyPartner)->first();
        if($checkExists){
            $osoba = Osoba::where('id_osoba',$id_osoba)->first();
            return view('showContact',[
                'siteNameTittle'=>'Persona',
                'osoba'=>$osoba,
            ]);
        }
        else{
          echo 's';
        }
    }
    public function addContact(){

    }

}
