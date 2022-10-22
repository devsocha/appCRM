<?php

namespace App\Http\Controllers;

use App\Models\company;
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
            return view('companyShow', [
                'siteNameTittle' => 'Kontakty',
                'firmy' => $firmy,
            ]);
        }else{
            return $company->lead();
        }

    }
}
