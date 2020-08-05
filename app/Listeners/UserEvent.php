<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use Session;
use DB;
use Carbon\Carbon;
use App\Login_tabs;
use Illuminate\Support\Facades\Auth;

class UserEvent
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
    public function handle(login $event)
    {   $id_user= Auth::user()->id;                          
      
        if(!(DB::table('login_tabs')->where([['user_id', $id_user],['day', Carbon::today()],])->first() ))
          {                                                               
                     DB::table('Login_tabs')->insert(
                     ['started_at1' => carbon::now(),'user_id'=> Auth::user()->id,'day'=>Carbon::today()]
                     );
          } 
        
                                                 
      
    }


}

