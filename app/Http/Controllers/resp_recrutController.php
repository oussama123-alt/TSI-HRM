<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\candidat;
use App\poste;
use Illuminate\Support\Facades\Storage;
use DB;
use  Illuminate\Http\UploadedFile;
use Carbon\Carbon;

class resp_recrutController extends Controller
{
 
     public function postDataForm(Request $request)
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


    public function createposte(Request $request)
  {  
    $name=$request->nom;
    $discription=$request->discription;
    $nbr_postes=$request->nbr_postes;
    DB::table('postes')->insert(
      ['name' => $name,'discription'=> $discription, 'nbr_postes'=>$nbr_postes ,'created_at' =>carbon::now()]
      );
  return redirect ('/resp_recrut/postes');

  }



    function redirect(Request $request)    
  {
    $candidats = DB::table('candidats')->get();
    
    return view('resp_recrut.resp_recrut_view_candidats', compact('candidats'));
  }


    public function delete(candidat $candidat)
  {  
    $candidat->delete();
    return redirect ('/resp_recrut');
  }


  public function download(candidat $candidat)
  {  
     $cvname=$candidat->cv;

     return response()->download(storage_path("app/public/cv/".$cvname));
    
  }
  function redirect2(Request $request)    
  {
    
    $postes = poste::all();
    return view('resp_recrut.resp_recrut_view_postes', compact('postes'));
  }
  function accept(candidat $candidat)    
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


function redirect3(poste $poste)    
  {
   $candidats=$poste->candidat;
   
    return view('resp_recrut.resp_recrut_view_details', ["poste"=>$poste , "candidats"=>$candidats]);
  
  }

  function filterCandidats(Request $request){
    
      $search=$request->search;
      $candidats = DB::table('candidats')->where([                  
          ['name', $search],])->get();
          return view('resp_recrut.resp_recrut_view_candidats', compact('candidats'));
}

function filterPostes(Request $request){
    
  $search=$request->search;
  $postes = DB::table('postes')->where([                  
      ['name', $search],])->get();
  return view('resp_recrut.resp_recrut_view_postes', compact('postes'));

}

function redirect4(candidat $candidat)    
  {
   $candidats= $candidat;
   
    return view('resp_recrut.resp_recrut_view_candidats_details', [ "candidat"=>$candidats]);
  
  }

  function modifierCandidat(Request $request){
       
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



  
}
