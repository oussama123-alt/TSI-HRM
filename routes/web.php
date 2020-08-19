<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/UserInterface', function () {
    $id_user= Auth::user()->id;
    $logs =DB::table('Login_tabs')->where('user_id', '=', Auth::user()->id)->get();
    $finish_at1=DB::table('Login_tabs')->where([                  
        ['user_id', $id_user],['day', Carbon::today()],])->get()->pluck('finnish_at1');
    $started_at2=DB::table('Login_tabs')->where([                  
            ['user_id', $id_user],['day', Carbon::today()],])->get()->pluck('started_at2');

    return view('UserInterface', ['logs' => $logs , 'finish_at1' => $finish_at1, 'started_at2' => $started_at2]);
});
Auth::routes();
Route::get('/pause', 'PauseController@stop');
Route::get('/reprise', 'PauseController@back');
Route::get('/home', 'HomeController@redirect')->name('home');


Route::post('/AdminInterface/{user}/filterdate', [
    'as' => 'searchdate',
    'uses' => 'AdminController@searchdate']);
Route::any('/AdminInterface/{name}/{id}','AdminController@redirect2');
Route::get('/AdminInterface/{user}', 'AdminController@show')->name('Admin.show'); 
Route::post('/AdminInterface/filter', [
    'as' => 'search',
    'uses' => 'AdminController@search']);
Route::get('/AdminInterface','AdminController@redirect');
Route::any('/modifier',[
    'as' => 'modifier',
    'uses' => 'login_tabsController@postDataForm'
]) ;


Route::post('/resp_recrut/filterCandidats', [
    'as' => 'search',
    'uses' => 'resp_recrutController@filterCandidats']);
Route::post('/resp_recrut/postes/filterPostes', [
    'as' => 'search',
    'uses' => 'resp_recrutController@filterPostes']);    
Route::get('/resp_recrut/postes/{poste}','resp_recrutController@redirect3');
Route::get('/resp_recrut/candidats/{candidat}','resp_recrutController@redirect4');
Route::get('/resp_recrut/postes','resp_recrutController@redirect2'); 
Route::get('/resp_recrut','resp_recrutController@redirect');
Route::get('/resp_recrut/create ',function () {
    $postes=DB::table('postes')->get();
    return view('resp_recrut.resp_recrut_create_candidat',compact('postes'));
}); 
Route::get('/resp_recrut/createposte ',function () {
    return view('resp_recrut.resp_recrut_create_poste');
}); 
  
Route::any('/resp_recrut/{candidat}','resp_recrutController@delete');
Route::any('/resp_recrut/{candidat}/download','resp_recrutController@download');
Route::get('/accept/{candidat}', 'resp_recrutController@accept');

Route::post('/create',[
    'as' => 'create',
    'uses' => 'resp_recrutController@postDataForm'
]) ; 
Route::post('/modifiierCandidat',[
    'as' => 'modifier',
    'uses' => 'resp_recrutController@modifierCandidat'
]) ;     
Route::any('/createposte',[
    'as' => 'createposte',
    'uses' => 'resp_recrutController@createposte'
]) ; 
       
 
             
              




