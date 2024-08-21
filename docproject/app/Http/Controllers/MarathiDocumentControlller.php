<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Session;

class MarathiDocumentControlller extends Controller
{
    //

    public function __construct(){
 
    }


    public function index(){
        
      return View::make('marathi_document.view');
      
    }

}
