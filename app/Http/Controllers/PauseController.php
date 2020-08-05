<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Auth\Events\Login;
use Carbon\Carbon;
use App\Login_tabs;
use Illuminate\Support\Facades\Auth;

class PauseController extends Controller
{
    //
    public function stop()
    {  $id_user= Auth::user()->id;
        DB::table('Login_tabs')->where([                   //insérer le temp de debut de la pause
            ['user_id', $id_user],
            ['day', Carbon::today()],])->update(
            ['finnish_at1' => carbon::now()]
            );
          
            return redirect('/UserInterface');
    }
    public function back()
    {  $id_user= Auth::user()->id;
        DB::table('Login_tabs')->where([                   //insérer le temp de fin de la pause
            ['user_id', $id_user],
            ['day', Carbon::today()],])->update(
            ['started_at2' => carbon::now()]
            );

            return redirect('/UserInterface');    
    }
}
