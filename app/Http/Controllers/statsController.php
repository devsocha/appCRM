<?php

namespace App\Http\Controllers;

use App\Models\lead;
use App\Models\leadproject;
use Faker\Core\DateTime;
use Illuminate\Http\Request;

class statsController extends Controller
{
    public function showMoney(){
        $leadController = new LeadController();
        $idFirmaPartner = $leadController->pobierzFirme();

        $podsumowanie = 0;
        $data = date("Y-m-d H:i:s", strtotime('-30 days'));
        $leady = $this->pobierzLeadProject($idFirmaPartner,$data);
        $maxContract = $this->MaxContractValue($idFirmaPartner , $data);
        $ileLead = $this->NewLeads($leady);
        $obrotNetto = $this->monthMoney($idFirmaPartner , $data);
        $monthEnd =$this->monthEndProjects($leady);
        $newLeads = $this->monthLeads($idFirmaPartner , $data);
        $statsContractsInCase= $this->AllContractsInCase($idFirmaPartner , $data);
        return view('app_central',[
            'siteNameTittle'=>'podsumowanie',
            'maxContract'=>$maxContract,
            'ileLead'=>$ileLead,
            'obrotNetto'=>$obrotNetto,
            'monthEnd'=>$monthEnd,
            'newLeads'=>count($newLeads),
            'statsContractsInCase'=>$statsContractsInCase,
        ]);

    }
    public function pobierzLeadProject($idFirmaPartner , $time){
        $leadProject = leadproject::where('id_firma_partner',$idFirmaPartner)->where('created_at','>=',$time)->get();
        return $leadProject;
    }
    private function NewLeads($leady){
        return $ileLead = count($leady);
    }
    private function MaxContractValue($idFirmaPartner , $time){
        $leadProject = leadproject::where('id_firma_partner',$idFirmaPartner)->where('created_at','>=',$time)->get();
        foreach ($leadProject as $lead){
                $ileMaxLead = $lead->project->where('rodzaj','zakończony')->max('kwota_netto');
        }
        return $ileMaxLead;
    }
        private function monthMoney($idFirmaPartner , $time){
        $leads = leadproject::where('id_firma_partner',$idFirmaPartner)->where('updated_at','>=',$time)->get();
        $podsumowanie = 0;
            foreach ($leads as $lead){
                if($lead->project->rodzaj === "zakończony"){
                    $podsumowanie += $lead->project->kwota_netto;
                }
            }
            return $podsumowanie;
        }
    private function monthEndProjects($leads){
        $podsumowanie = 0;
        foreach ($leads as $lead){
            if($lead->project->rodzaj === "zakończony"){
                $podsumowanie ++;
            }
        }
        return $podsumowanie;
    }
    private function monthLeads($idFirmaPartner , $time){
        $leady = lead::where('id_firma_partner',$idFirmaPartner)->where('created_at','>=',$time)->get();
        return $leady;
    }
    private function AllContractsInCase($idFirmaPartner , $time){
        $leads = leadproject::where('id_firma_partner',$idFirmaPartner)->where('updated_at','>=',$time)->where('created_at','>=',$time)->get();
        $podsumowanie = 0;
        foreach ($leads as $lead){
            if($lead->project->rodzaj != "zakończony"){
                $podsumowanie ++;
            }
        }
        return $podsumowanie;
    }
}
