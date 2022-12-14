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
    public function sprawdzLeada($idFirmy){
        $idPartnera = $this->pobierzFirme();
        if(lead::where('id_firma',$idFirmy)->where('id_firma_partner',$idPartnera)->exists()){
            $lead = lead::where('id_firma',$idFirmy)->where('id_firma_partner',$idPartnera)->first();
            return $lead->id_lead;
        }else{
            return $lead = 0;
        }
    }

    public function lead($nr){
        $id_company = $this->pobierzFirme();
        $skip = ($nr-1)*10;
        $firmy = lead::where('id_firma_partner',$id_company)->skip($skip)->take(10)->orderBy("updated_at",'desc')->get();
        $ilość = ceil(count(lead::where('id_firma_partner',$id_company)->get())/10);
        return view('app_leads',[
            'siteNameTittle' => 'Leady',
            'firmy'=> $firmy,
            'ilość'=>$ilość,
        ]);
    }
    public function addLead(Request $request){
        $idCompanyPartner = $this->pobierzFirme();
        $nipFirmy = $request->input('nipFirmy');
        $branzaFirmy = $request->input('branzaFirmy');
        $adresFirmy = $request->input('adresFirmy');
        $kodPocztowyFirmy = $request->input('kodPocztowyFirmy');
        $miejscowoscFirmy = $request->input('miejscowoscFirmy');
        $nazwaFirmy = $request->input('nazwaFirmy');
        $idCompany = $this->checkCompanyExist($nipFirmy,$branzaFirmy,$adresFirmy,$kodPocztowyFirmy,$miejscowoscFirmy,$nazwaFirmy);
        $this->addLeadToDb($idCompany,$idCompanyPartner);
        $nr=1;
        return back();
    }
    private function checkCompanyExist($nipFirmy,$branzaFirmy,$adresFirmy,$kodPocztowyFirmy,$miejscowoscFirmy,$nazwaFirmy){
        if(company::where('nip',$nipFirmy)->exists()){
            $firma = company::where('nip',$nipFirmy)->first();
            $id_firma = $firma->id_firma;
            return $id_firma;
        }else{
            $company = company::create([
                'nazwa'=>$nazwaFirmy,
                'nip'=>$nipFirmy,
                'ulica'=>$adresFirmy,
                'kod_pocztowy'=>$kodPocztowyFirmy,
                'miasto'=>$miejscowoscFirmy,
                'partnerstwo'=> 0,
                'usługi'=>$branzaFirmy,
            ]);
            $firma = company::where('nip',$nipFirmy)->first();
            $id_firma = $firma->id_firma;
            return $id_firma;
        }
    }
    private function addLeadToDb($idCompany, $idCompanyPartner){
        if(lead::where('id_firma',$idCompany)->where('id_firma_partner',$idCompanyPartner)->exists()){
            return;
        }else{
            $lead = lead::create([
                'id_firma'=>$idCompany,
                'id_firma_partner'=>$idCompanyPartner,
            ]);
            return $lead;
        }

    }
    public function searchCompany(Request $request){
        $search = $request->input('search');
        $company = $this->pobierzFirme();
        $firmy = company::where('nazwa',$search)->orwhere('nip',$search)->first();
        if(isset($firmy->id_firma)){
            $id= $firmy->id_firma;
        }else{
            $id=0;
        }
        $comp = lead::where('id_firma_partner',$company)->where('id_firma',$id)->get();
        if(lead::where('id_firma_partner',$company)->where('id_firma',$id)->exists()){
            $ilość = 1;
            return view('app_leads',[
                'siteNameTittle' => 'Leady',
                'firmy'=> $comp,
                'ilość'=>$ilość,
            ]);
        }else{
            return $this->lead(1);
        }
    }
    public function deleteCompany($id){
        $idCompanyPartner = $this->pobierzFirme();

        $lead = lead::where('id_firma_partner',$idCompanyPartner)->where('id_firma',$id)->delete();
        return back();
    }
}
