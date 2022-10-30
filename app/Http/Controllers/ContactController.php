<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\contact;
use App\Models\lead;
use App\Models\Osoba;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showContacts($idOsoba, $idLead){
        $company = new LeadController();
        $idCompanyPartner = $company->pobierzFirme();
        $checkExists = lead::where('id_lead',$idLead)->where('id_firma_partner',$idCompanyPartner)->first();
        if($checkExists){
            $osoba = Osoba::where('id_osoba',$idOsoba)->first();
            return view('showContact',[
                'siteNameTittle'=>'Persona',
                'osoba'=>$osoba,
                'idLeada'=>$idLead,
            ]);
        }else{
            return back();
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

    public function addContact($id){
        $idFirma = $id;
        return view('addContact',[
            'siteNameTittle' => 'Dodawanie Kontaktu',
            'idFirma'=>$idFirma
        ]);
    }
    public function addContactDb($id, Request $request){
        $imie = $request->input('name');
        $nazwisko = $request->input('secoundName');
        $phone = $request->input('phone');
        $mail = $request->input('mail');
        $dzial = $request->input('dzial');
        $stanowisko = $request->input('stanowisko');
        $city = $request->input('city');
        $hod = $request->input('hod');
        $hdo = $request->input('hdo');
        (string)$hods=$hod;
        (string)$hdos=$hdo;
        $godzinyPracy = $hods . '-' . $hdos;
        $leadController = new LeadController();
        $lead = $leadController->sprawdzLeada($id);
        if($lead==0){
            return back();
        }else{
            $idOsoba = $this->checkContactExist($imie,$nazwisko,$phone,$mail,$dzial,$stanowisko,$city,$godzinyPracy,$id);
            $firmaPartner = $leadController->pobierzFirme();
            $this->addContactOsoba($lead,$idOsoba,$firmaPartner);
            $view = new companyShowController();
            return $view->companyShow($id);
        }
    }
    private function addContactOsoba($idLead,$idOsoba,$idFirmaPartner){
        $contacts = contact::create([
            'id_lead'=>$idLead,
            'id_osoba'=>$idOsoba,
            'id_firma_partner'=>$idFirmaPartner,
        ]);
    }
    private function checkContactExist($imie,$nazwisko,$phone,$mail,$dzial,$stanowisko,$city,$godzinyPracy,$idFirma){
        $check = Osoba::where('imie',$imie)->where('nazwisko',$nazwisko)->exists();
        if($check){
            $osoba =Osoba::where('imie',$imie)->where('nazwisko',$nazwisko)->first();
            $idOsoba = $osoba->id_osoba;
            return $idOsoba;
        }else{
            Osoba::create([
                'imie'=>$imie,
                'nazwisko'=>$nazwisko,
                'dział'=>$dzial,
                'miejscowość'=>$city,
                'stanowisko'=>$stanowisko,
                'numer_telefonu'=>$phone,
                'email'=>$mail,
                'id_firma'=>$idFirma,
                'godziny_pracy'=>$godzinyPracy,
            ]);
            $osoba =Osoba::where('imie',$imie)->where('nazwisko',$nazwisko)->first();
            $idOsoba = $osoba->id_osoba;
            return $idOsoba;
        }
    }
    public function editContactDb($idOsoba,$idLead, Request $request){
        $partnerFirma = new LeadController();
        $idPartnerFirma = $partnerFirma->pobierzFirme();
        $hod = $request->input('hod');
        $hdo = $request->input('hdo');
        (string)$hods=$hod;
        (string)$hdos=$hdo;
        $godzinyPracy = $hods.'-'.$hdos;
        if(contact::where('id_firma_partner',$idPartnerFirma)->where('id_osoba',$idOsoba)->exists()){
            $updateOsoba = Osoba::where('id_osoba',$idOsoba)->update([
                'imie'=>$request->input('name'),
                'nazwisko'=>$request->input('secoundName'),
                'dział'=>$request->input('dzial'),
                'miejscowość'=>$request->input('city'),
                'stanowisko'=>$request->input('stanowisko'),
                'numer_telefonu'=>$request->input('phone'),
                'email'=>$request->input('mail'),
                'godziny_pracy'=>$godzinyPracy,
            ]);
            return back();
        }else{
            return back();
        }

    }
    public function editContact($idOsoba,$idLead){
        $partnerFirma = new LeadController();
        $idPartnerFirma = $partnerFirma->pobierzFirme();
        if(contact::where('id_firma_partner',$idPartnerFirma)->where('id_osoba',$idOsoba)->exists()){
            $osoba = Osoba::where('id_osoba',$idOsoba)->first();
            return view('editContact',[
                'siteNameTittle'=>'Edycja kontaktu',
                'osoba'=>$osoba,
                'id'=>$idOsoba,
                'idLead'=>$idLead,
            ]);
        }else{
           return back();
        }


    }
    public function deleteContact($idOsoba){
        $partnerFirma = new LeadController();
        $idPartnerFirma = $partnerFirma->pobierzFirme();
        $osoba = Osoba::where('id_osoba',$idOsoba)->first();
        $firmaOsoby = $osoba->id_firma;
        $firma = contact::where('id_osoba',$idOsoba)->where('id_firma_partner',$idPartnerFirma)->delete();
        $returnFirma = new companyShowController();
        return $returnFirma->companyShow($firmaOsoby);
    }

}
