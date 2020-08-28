<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\candidat;
use App\poste;
use App\User;
use App\formation;
use Illuminate\Support\Facades\Storage;
use DB;
use  Illuminate\Http\UploadedFile;
use Carbon\Carbon;

class resp_recrutController extends Controller
{
 
     public function postDataForm(Request $request)      //crée un candidat
    {   
        $name=$request->nom;
        $email=$request->email;
        $phone=$request->phone;
        $surname=$request->surname;
        $adress=$request->adress;
        $disponibilité=$request->disponibilité;
        $salaire_min=$request->salaire_min;
        $poste_similaire=$request->poste_similaire;
        $exp_years=$request->exp_years;
        $langues=$request->lang;
        $role=$request->role;
        $cv=$request->file; 
        

        $posteid = DB::table('postes')->where([                          //selection de role_id d'apres table role
          ['name', $role], ])->get()->pluck('id');                                    
        
        $request->file('file')->store('public/cv');
        $cvname=$cv->hashName();
        
        DB::table('candidats')->insert(
            ['name' => $name,'email'=> $email,'cv'=>$cvname, 'phone'=>$phone ,'surname'=>$surname ,'adress'=>$adress ,
            'disponibilité'=>$disponibilité ,'salair_min'=>$salaire_min ,'poste_similaire'=>$poste_similaire,'exp_years'=>$exp_years,
            'langues'=>$langues,'poste_id' =>$posteid[0]]
            );
        return redirect ('/resp_recrut');
    }


    public function createposte(Request $request)    //crée u  poste et redirect vers le page view postes
  {  
    $name=$request->nom;
    $discription=$request->discription;
    $nbr_postes=$request->nbr_postes;
    DB::table('postes')->insert(
      ['name' => $name,'discription'=> $discription, 'nbr_postes'=>$nbr_postes ,'created_at' =>carbon::now()]
      );
  return redirect ('/resp_recrut/postes');

  }



    function redirect(Request $request)    //redirect  vers le page view candidats
  {
    $candidats = DB::table('candidats')->get();
    
    return view('resp_recrut.resp_recrut_view_candidats', compact('candidats'));
  }


    public function delete(candidat $candidat)       //fonction pour supprimer un candidat
  {  
    $candidat->delete();
    return redirect ('/resp_recrut');
  }


  public function download(candidat $candidat)     //fonction pour telecharger le cv
  {  
     $cvname=$candidat->cv;

     return response()->download(storage_path("app/public/cv/".$cvname));
    
  }
  function redirect2(Request $request)    //redirect vers le page view postes
  {
    $postes = poste::all();
    return view('resp_recrut.resp_recrut_view_postes', compact('postes'));
  }
  function accept(candidat $candidat)     //accepter ou refuser une candidat         
  {
    
    if($candidat->status =='refusé'){
      DB::table('candidats')->where([['id',$candidat->id],])->update(['status' => 'accepté']);
      return redirect ('/resp_recrut');
    }
    elseif($candidat->status=='pending'){
      DB::table('candidats')->where([['id',$candidat->id],])->update(['status' => 'accepté']);
    return redirect ('/resp_recrut');
  }
  elseif($candidat->status=='accepté'){
    DB::table('candidats')->where([['id',$candidat->id],])->update(['status' => 'refusé']);
    return redirect ('/resp_recrut');

  }
}


function redirect3(poste $poste)          //redirect vers le page de details
  {
   $candidats=$poste->candidat;
   
    return view('resp_recrut.resp_recrut_view_details', ["poste"=>$poste , "candidats"=>$candidats]);
  
  }

  function filterCandidats(Request $request){     //function de recherche dans le page view candidats
    
      $search=$request->search;
      $candidats = DB::table('candidats')->where([                  
          ['name', $search],])->get();
          return view('resp_recrut.resp_recrut_view_candidats', compact('candidats'));
}

function filterPostes(Request $request){        //function de recherche dans le page view postes
    
  $search=$request->search;
  $postes = DB::table('postes')->where([                  
      ['name', $search],])->get();
  return view('resp_recrut.resp_recrut_view_postes', compact('postes'));

}

function redirect4(candidat $candidat)     //redirect vers le page view candidats details
  {
   $candidats= $candidat;
   
    return view('resp_recrut.resp_recrut_view_candidats_details', [ "candidat"=>$candidats]);
  
  }

  function modifierCandidat(Request $request){  //modifer le candidat et redirect
       
        $id=$request->id;
        $candidat=  candidat::find($id);
      
        if(!empty($request->nom)) {
          $candidat->name = $request->nom;
          
        }
        if(!empty($request->email)) {
          $candidat->email = $request->email;
        }
        if(!empty($request->phone)) {
          $candidat->phone =$request->phone;
        }
        if(!empty($request->surname)) {
          $candidat->surname = $request->surname;
        }
        if(!empty($request->adress)) {
          $candidat->adress = $request->adress;
        }
        if(!empty($request->disponibilité)) {
          $candidat->disponibilité = $request->disponibilité;
        }
        if(!empty($request->salaire_min)) {
          $candidat->salair_min = $request->salaire_min;
        }
        if(!empty($request->poste_similaire)) {
          $candidat->poste_similaire = $request->poste_similaire;
        }
        if(!empty($request->status)) {
          $candidat->status = $request->status;
        }
        if(!empty($request->exp_years)) {
          $candidat->exp_years = $request->exp_years;
        }
       
          $candidat->langues = $request->lang;
        
          $candidat->save(); 

       return redirect ('/resp_recrut');
  }

   public function createFormation(Request $request)   //crée une formation et redirect vers la page ...
  {  
    $formation = new formation ;
    $formation->name= $request->name;
    $formation->contenu=$request->contenu;
    $formation->debut=$request->debut ;
    $formation->fin=$request->fin;
    $formation->formateur_id = DB::table('users')->where([['name', $request->formateur],])->pluck('id')->first();
    $formation->created_at = carbon::now();
    $formation->save();
    $participants= explode(',',$request->particip[0]);
    foreach($participants as $participant){
     $formation->participants()->sync(User::where('name', $participant)->get());
       }
return redirect('/resp_recrut/formations');
  }

public function viewFormation(Request $request){   //redirect ver page view formations
$formations= formation::all();
return view('resp_recrut.resp_recrut_view_formations', [ "formations"=>$formations]);
 }

 public function deleteFormation(formation $formation)       //fonction pour supprimer un formation
  {  
    $formation->delete();
    DB::table('formation_user')->where([['formation_id', $formation->id],])->delete();
    return redirect ('/resp_recrut/formations');
  }
  
  public function formationDetails(formation $formation){
  return view('resp_recrut.resp_recrut_view_formations_details', [ "formation"=>$formation]);
  }

  public function modifierFormation(Request $request){
    $id=$request->id;
    $formation=  formation::find($id);

    if(!empty($request->nom)) {
      $formation->name = $request->nom;
    }
    if(!empty($request->contenu)) {
      $formation->contenu = $request->contenu;
    }
    if(!empty($request->formateur)) {
      $formation->formateur_id = DB::table('users')->where([['name', $request->formateur],])->pluck('id')->first();
    }
    if(!empty($request->debut)) {
      $formation->debut = $request->debut;
    }
    if(!empty($request->fin)) {
      $formation->debut = $request->fin;
    }
    
      
      $participants= explode(',',$request->particip[0]);
      $formation->participants()->detach();
      
      foreach($participants as $participant){
       $formation->participants()->attach(User::where('name', $participant)->get());
         }
      
      
      $formation->save();  
      return view('resp_recrut.resp_recrut_view_formations_details', [ "formation"=>$formation]);

  }
   


}
