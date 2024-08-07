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



 
// Route::get('/', function () {
//     return view('welcome');
// });

 Route::get('/', 'LoginController@index')->name('login');
Route::post('/loginprocess', 'LoginController@loginprocess')->name('loginprocess');
Route::get('/logout', 'LoginController@logout')->name('logout');
//Protected Routes
   
Route::middleware([loginmiddleware::class])->group(function () {

    //Dashboard Routes
        Route::get('/dashboard', 'DashboardControlller@index')->name('dashboard');

    
});