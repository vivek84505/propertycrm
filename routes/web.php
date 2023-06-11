<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
 

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

Route::get('/', 'LoginController@index')->name('login');
Route::post('/loginprocess', 'LoginController@loginprocess')->name('loginprocess');
Route::get('/logout', 'LoginController@logout')->name('logout');


 
Route::middleware([loginliddleware::class])->group(function () {

    //Dashboard Routes
    Route::get('/dashboard', 'DashboardControlller@index')->name('dashboard');

    // User Routes
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::get('/users', 'UserController@index')->name('users');
    Route::post('/usersgetall', 'UserController@getuserAll')->name('usersgetall');
    Route::post('/useradd', 'UserController@userAdd')->name('useradd');
    Route::post('/useredit', 'UserController@userEdit')->name('useredit');
    Route::post('/userdelete', 'UserController@userDelete')->name('userdelete');
    Route::post('/getuserbyid', 'UserController@getuserById')->name('getuserbyid');
    Route::post('/changepassword', 'UserController@changepassword')->name('changepassword');


    // Lead Source Routes
     Route::get('/leadsource', 'LeadSourceController@index')->name('leadsource');
     Route::post('/leadsourcegetall', 'LeadSourceController@leadsourceAll')->name('leadsourcegetall');
     Route::post('/getleadsourcebyid', 'LeadSourceController@getleadsourceById')->name('getleadsourcebyid');
     Route::post('/leadsourceedit', 'LeadSourceController@leadsourceEdit')->name('leadsourceedit');
     Route::post('/leadsourcdelete', 'LeadSourceController@leadsourcDelete')->name('leadsourcdelete');
     Route::post('/leadsourceadd', 'LeadSourceController@leadsourceAdd')->name('leadsourceadd');


     // Lead Status Routes
     Route::get('/leadstatus', 'LeadStatusController@index')->name('leadstatus');
     Route::post('/leadstatusgetall', 'LeadStatusController@leadstatusgetAll')->name('leadstatusgetall');
     Route::post('/leadstatusadd', 'LeadStatusController@leadstatusaddAdd')->name('leadstatusadd');
     Route::post('/getleadstatusbyid', 'LeadStatusController@getleadstatusById')->name('getleadstatusbyid');
     Route::post('/leadstatusedit', 'LeadStatusController@leadstatusEdit')->name('leadstatusedit');
     Route::post('/leadstatusdelete', 'LeadStatusController@leadstatusDelete')->name('leadstatusdelete');
 

      // Lead Routes
    Route::get('/leads', 'LeadController@index')->name('leads');
    Route::post('/leadsgetall', 'LeadController@getleadsAll')->name('leadsgetall');
    
    Route::post('/leadadd', 'LeadController@leadAdd')->name('leadadd');
    Route::get('/leadsedit/{leadid}', 'LeadController@leadEdit')->name('leadsedit');
    Route::post('/leadsedit/leadeditsave', 'LeadController@leadEditSave')->name('leadeditsave');
    
    Route::get('/leadsearch', 'LeadController@leadsearch')->name('leadsearch');
    Route::post('/leadsearchall', 'LeadController@leadsearchAll')->name('leadsearchall');
    
    Route::post('/leadsdelete', 'LeadController@leadDelete')->name('leaddelete');
    Route::post('/getleadbyid', 'LeadController@leadById')->name('leadbyid');
    
    Route::post('/getleadloglist', 'LeadController@getleadloglist')->name('getleadloglist');
    Route::post('/leadremarkadd', 'LeadController@leadremarkAdd')->name('leadremarkadd');

  

    // Ajax Routes
    Route::post('/getdistrictbystateid', 'AjaxController@getdistrictbystateid')->name('getdistrictbystateid');
    Route::post('/getcustomers', 'AjaxController@getcustomers')->name('getcustomers');
    Route::post('/getdashboarddataall', 'AjaxController@getDashboarddataAll')->name('getdashboarddataall');

    //Customer Routes
    Route::post('/customeradd', 'CustomerController@customerAdd')->name('customeradd');
});
 

  