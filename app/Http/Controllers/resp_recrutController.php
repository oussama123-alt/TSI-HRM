<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\candidat;
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
        $role=$request->role;
        $cv=$request->file; 
       $posteid = DB::table('postes')->where([                          //selection de role_id d'apres table role
          ['name', $role], ])->get()->pluck('id');                                    
        
        $request->file('file')->store('public/cv');
        $cvname=$cv->hashName();
        
        DB::table('candidats')->insert(
            ['name' => $name,'email'=> $email,'cv'=>$cvname, 'phone'=>$phone ,'poste_id' =>$posteid[0]]
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
    $postes = DB::table('postes')->get();
    
    return view('resp_recrut.resp_recrut_view_postes', compact('postes'));
  }
  


  
}
