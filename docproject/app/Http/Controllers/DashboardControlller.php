<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Session;

class DashboardControlller extends Controller
{
    //

    public function __construct(){
 
    }


    public function index(){
    
      
        return View::make('dashboard.dashboard');
    }

}
