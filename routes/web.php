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
    Route::post('/userdelete', 'UserController@userDelete')->name('userdelete');



});
 

  