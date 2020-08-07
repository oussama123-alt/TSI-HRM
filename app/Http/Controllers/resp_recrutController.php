<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\candidat;
use Illuminate\Support\Facades\Storage;
use DB;
use  Illuminate\Http\UploadedFile;


class resp_recrutController extends Controller
{
 
     public function postDataForm(Request $request)
    {
        $name=$request->nom;
        
        $email=$request->email;
        $phone=$request->phone;
        $cv=$request->file;
        
        $request->file('file')->store('public/cv');
        $cvname=$cv->hashName();
        
        DB::table('candidats')->insert(
            ['name' => $name,'email'=> $email,'cv'=>$cvname, 'phone'=>$phone]
            );
        return redirect ('/resp_recrut');
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


  
}
