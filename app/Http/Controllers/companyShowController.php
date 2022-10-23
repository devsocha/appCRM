<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\contact;
use App\Models\lead;
use Illuminate\Http\Request;

class companyShowController extends Controller
{
    public function companyShow($id)
    {
        $firmy = company::where('id_firma',$id)->first();
        $idCompany = $id;
        $company = new LeadController();
        $idCompanyPartner = $company->pobierzFirme();
        if(lead::where('id_firma',$idCompany)->where('id_firma_partner',$idCompanyPartner)->exists()){
            $id_leada = $this->takeLead($idCompany,$idCompanyPartner);
            $kontakty = contact::where('id_lead',$id_leada)->get();
            return view('companyShow', [
                'siteNameTittle' => 'Kontakty',
                'firmy' => $firmy,
                'kontakty'=>$kontakty,
            ]);
        }else{
            return $company->lead(1);
        }

    }
    private function takeLead($idCompany,$idCompanyPartner){
        $lead = lead::where('id_firma',$idCompany)->where('id_firma_partner',$idCompanyPartner)->first();
        return $lead->id_lead;
    }
}
