<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class login_tabsController extends Controller
{
    public function postDataForm(Request $request){

        $started_at1=$request->started_at1;
        
        $finnish_at1=$request->finnish_at1;
        $started_at2=$request->started_at2;
        $finish_at2=$request->finish_at2;
        $log_id= $request->input('log_id');

       $user_id = $request->input('user_id');
        $user_name = DB::table('users')->where([                  
            ['id', $user_id],])->get()->pluck('name');
            
        $morn= carbon::parse($started_at1)->diffInSeconds(carbon::parse($finnish_at1)); //calculer totale
        $mid= carbon::parse($started_at2)->diffInSeconds(carbon::parse( $finish_at2));
        $totale=round( ($morn + $mid)/3600, 1);    
        
        DB::table('Login_tabs')->where([                   //insérer le temp finish_at2
            ['id', $log_id],])->update(
            ['started_at1' => $started_at1,
            'finnish_at1' => $finnish_at1,
            'started_at2' => $started_at2,
            'finish_at2' => $finish_at2,
            'totale' => $totale ],
            );
            return redirect('/AdminInterface/'.$user_name[0]);
        
     }
    //
}
