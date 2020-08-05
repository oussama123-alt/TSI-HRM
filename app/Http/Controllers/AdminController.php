<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
Use App\User;


class AdminController extends Controller
{
    //
    function redirect(Request $request)    
{
   $users = DB::table('users')->get();
    return view('Admin.adminInterface', compact('users'));
}
function search(Request $request)    
{
    $search=$request->search;
    $users = DB::table('users')->where([                  
        ['name', $search],])->get();
    return view('Admin.adminInterface', compact('users'));
}
public function searchdate( User $user ,Request $request){
    $date=$request->date;
    $logs= DB::table('Login_tabs')->where([                  
        ['user_id', $user->id],
        ['day', $date]  ])->get();
  return view('Admin.adminUserInterface', compact('user','logs'));
 }


public function show( User $user){
    $logs= DB::table('Login_tabs')->where([                  
        ['user_id', $user->id],])->get();
  return view('Admin.adminUserInterface', compact('user','logs'));
 }

 public function redirect2($name, $id){
  $log =  DB::table('Login_tabs')->where([
      ['id', $id],])->get()->first();
      if(!is_null($log))
      {
        return view('Admin.adminInterfaceModifier', compact('log')); 
      }
else{
    
    abort(404);  
}
 }
 
}
