<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Logout;
use DB;
use Carbon\Carbon;
use App\Login_tabs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use DateTime;
class UserLogout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle( Logout $event)
    {   $id_user= Auth::user()->id;
        $start_at1=DB::table('Login_tabs')->where([                  
              ['user_id', $id_user],
              ['day', Carbon::today()],])->get()->pluck('started_at1');

        $finish_at1=DB::table('Login_tabs')->where([                  
                ['user_id', $id_user],
                ['day', Carbon::today()],])->get()->pluck('finnish_at1'); 

        $start_at2=DB::table('Login_tabs')->where([                  
                    ['user_id', $id_user],
                    ['day', Carbon::today()],])->get()->pluck('started_at2');            
              
            $morn= carbon::parse($start_at1[0])->diffInSeconds(carbon::parse($finish_at1[0]));
            $mid= carbon::parse($start_at2[0])->diffInSeconds(carbon::now());
            $totale=round( ($morn + $mid)/3600, 1);
           
           
      
        DB::table('Login_tabs')->where([                   //insérer le temp finish_at2
            ['user_id', $id_user],
            ['day', Carbon::today()],])->update(
            ['finish_at2' => carbon::now()]
            );

                
            
         DB::table('Login_tabs')->where([                   //insérer le totale de travaile
                ['user_id', $id_user],
                ['day', Carbon::today()],])->update(
                ['totale' => $totale]
                );


        
    }
}
