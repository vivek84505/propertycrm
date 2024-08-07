<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Session;
class LoginController extends Controller
{
    //
    public function index(){
        return View::make('login.login');
    }
}
