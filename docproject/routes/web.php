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

    //Settings Routes
    Route::get('/settings', 'SettingsController@index')->name('settings');


     // User Routes
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::get('/users', 'UserController@index')->name('users');
    Route::post('/usersgetall', 'UserController@getuserAll')->name('usersgetall');
    Route::post('/useradd', 'UserController@userAdd')->name('useradd');
    Route::post('/useredit', 'UserController@userEdit')->name('useredit');
    Route::post('/userdelete', 'UserController@userDelete')->name('userdelete');
    Route::post('/getuserbyid', 'UserController@getuserById')->name('getuserbyid');
    Route::post('/changepassword', 'UserController@changepassword')->name('changepassword');

     // Document Routes
    Route::get('/marathidocument', 'MarathiDocumentControlller@index')->name('marathidocument');
    Route::get('/marathidocument_old', 'MarathiDocumentControlller@marathidocument_old')->name('marathidocument_old');

});