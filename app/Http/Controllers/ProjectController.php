<?php

namespace App\Http\Controllers;

use App\Models\lead;
use App\Models\leadproject;
use App\Models\project;
use App\Models\userfirma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function showProject($idFirma){
        $leadController = new LeadController();
        $idFirmaPartner = $leadController->pobierzFirme();

        if(lead::where('id_firma',$idFirma)->where('id_firma_partner',$idFirmaPartner)->exists()){
            $lead = lead::where('id_firma',$idFirma)->where('id_firma_partner',$idFirmaPartner)->first();
            $idLead = $lead->id_lead;
            $leadProject = leadproject::where('id_lead',$idLead)->orderBy("updated_at",'desc')->get();
            return $leadProject;
        }
    }
    public function showProjectAll(){
        $leadController = new LeadController();
        $idFirmaPartner = $leadController->pobierzFirme();
        $projects = leadproject::where('id_firma_partner',$idFirmaPartner)->orderBy("updated_at",'desc')->get();
        return view('app_projects',[
            'siteNameTittle'=> 'projekty',
            'projects'=> $projects,
        ]);
    }
    public function addProject($idFirma){
        $leadController = new LeadController();
        $idFirmaPartner = $leadController->pobierzFirme();
        $id = Auth::id();
        $handlowcy = userfirma::where('id_firma', $idFirmaPartner)->where('id_osoba','!=',$id)->get();
       return view('add_project',[
           'siteNameTittle' => 'DodawanieProjektu',
           'idFirma'=>$idFirma,
           'handlowcy'=>$handlowcy,
       ]);
    }
    public function deleteProject(){

    }
    public function editProject(){

    }
    public function addProjectDb($idFirma, Request $request){
        echo $request->input('osoba');
    }
}
