<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\candidat;
use Illuminate\Support\Facades\Storage;

class resp_recrutController extends Controller
{
 /*   public function postDataForm(Request $request){

        $name=$request->nom;
        
        $email=$request->email;
        $cv=$request->file;
        if($request->file('file')){
            $file = $request->file('file');
             $filename = time() . '.' . $file->getClientOriginalExtension();
            $request->file->move('storage/', $filename);
            $data->file = $filename;
            }
        dd($cv);
        
     }*/
     public function postDataForm(Request $request)
    {
        $name=$request->nom;
        
        $email=$request->email;
        $cv=$request->file('file');
        dd($cv);
        $path = $cv->store('public');
        $cvpath= storage_path('public').$request->file;
        
    
    }



    function redirect(Request $request)    
{
   
    return view('resp_recrut.resp_recrut_view_candidats');
}

  
}
