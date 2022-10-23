<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\contact;
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
    public function showContactsAll(){
        $company = new LeadController();
        $idCompanyPartner = $company->pobierzFirme();
        $osoby = contact::where('id_firma_partner',$idCompanyPartner)->get();
        return view('app_contacts',[
                'siteNameTittle'=>'Kontakty',
                'osoby'=>$osoby,
            ]);
    }

    public function addContact(){

    }

}
