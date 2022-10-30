<?php

namespace App\Http\Controllers;

use App\Models\lead;
use App\Models\leadproject;
use App\Models\project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function showProject($idFirma){
        $leadController = new LeadController();
        $idFirmaPartner = $leadController->pobierzFirme();

        if(lead::where('id_firma',$idFirma)->where('id_firma_partner',$idFirmaPartner)->exists()){
            $lead = lead::where('id_firma',$idFirma)->where('id_firma_partner',$idFirmaPartner)->first();
            $idLead = $lead->id_lead;
            $leadProject = leadproject::where('id_lead',$idLead)->get();
            return $leadProject;
        }
    }
    public function addProject(){
    }
    public function deleteProject(){

    }
    public function editProject(){

    }
    public function addToDbProject(){

    }
}
