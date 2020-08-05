<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class resp_recrutController extends Controller
{
    function redirect(Request $request)    
{
   
    return view('resp_recrut.resp_recrut_view_candidats');
}
    //
}
