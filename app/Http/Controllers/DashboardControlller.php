<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
class DashboardControlller extends Controller
{
    //

    public function index(){
        return View::make('dashboard');
    }

}
