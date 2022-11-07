<?php

namespace App\Http\Controllers;

use App\Models\lead;
use App\Models\leadproject;
use App\Models\project;
use App\Models\User;
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
    public function showProjectToScreen($idProjekt, $idFirma){
        $leadController = new LeadController();
        $idFirmaPartner = $leadController->pobierzFirme();
        if(lead::where('id_firma',$idFirma)->where('id_firma_partner',$idFirmaPartner)->exists()){
            $leadProject = leadproject::where('id_firma_partner',$idFirmaPartner)->where('id_project',$idProjekt)->first();
            $idHandlowca = $leadProject->project->id_osoba;
            $handlowiec = User::where('id',$idHandlowca)->first();
            return view('showProject',[
                'siteNameTittle'=>'Projekt',
                'projekt'=>$leadProject,
                'handlowiec'=>$handlowiec,
            ]);
        }else {
            return back();
        }
    }
    public function deleteProject($idProjekt, $idFirma){
        $leadController = new LeadController();
        $firmaPartner = $leadController->pobierzFirme();
        $lead = lead::where('id_firma',$idFirma)->where('id_firma_partner',$firmaPartner)->first();
        if($lead){
            $leadProject = leadproject::where('id_lead',$lead->id_lead)->where('id_project',$idProjekt)->where('id_firma_partner',$firmaPartner)->delete();
            $project = project::where('id_projekt',$idProjekt)->delete();
            $companyShow= new companyShowController();
            return $companyShow->companyShow($idFirma);
        }else{
            $companyShow= new companyShowController();
            return $companyShow->companyShow($idFirma);
        }
    }
    public function editProject(){

    }
    public function addProjectDb($idFirma, Request $request){
        $leadController = new LeadController();
        $idFirmaPartner = $leadController->pobierzFirme();
        $idLead = $this->pobierzLeada($idFirma,$idFirmaPartner);
        $opis = $request->input('opis');
        $tytul = $request->input('nazwa');
        $kwotaNetto = $request->input('kwotaNetto');
        $osoba = $request->input('osoba');
        if(lead::where('id_lead',$idLead)->where('id_firma_partner',$idFirmaPartner)->where('id_firma',$idFirma)->exists()){
            $this->addToDbProject($idLead, $idFirma, $idFirmaPartner, $tytul, $opis, $kwotaNetto, $osoba);
            $companyShow= new companyShowController();
            return $companyShow->companyShow($idFirma);
        }else{
            $companyShow= new companyShowController();
            return $companyShow->companyShow($idFirma);
        }


    }
    public function pobierzLeada($idFirma, $idFirmaPartner){
        $lead = lead::where('id_firma',$idFirma)->where('id_firma_partner',$idFirmaPartner)->first();
        return $lead->id_lead;
    }
    private function addToDbProject($idLead, $idFirma, $idPartnerFirma, $tytul, $opis, $kwotaNetto, $osoba){
        $addProject = project::create([
            'nazwa'=>$tytul,
            'opis'=>$opis,
            'kwota_netto'=>$kwotaNetto,
            'id_osoba'=>$osoba
        ]);
        $project = project::where('nazwa',$tytul)->where('opis',$opis)->where('kwota_netto',$kwotaNetto)->where('id_osoba',$osoba)->first();
        $idProjekt = $project->id_projekt;
        $addProjectLead = leadproject::create([
            'id_lead'=> $idLead,
            'id_firma_partner'=>$idPartnerFirma,
            'id_project'=>$idProjekt,
        ]);
    }

}
