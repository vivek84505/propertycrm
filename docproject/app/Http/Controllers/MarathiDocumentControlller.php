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
        
      return View::make('document.wizardform');
      
    }

    public function marathidocument_old(){
        
      return View::make('marathi_document.marathi-doc-stepone');
      
    }

    public function marathidoc_stepone_submit(Request $request){
        
      

       if ($request->hasFile('religious_symbol')) {
        // Get the file from the request
        $file = $request->file('religious_symbol');

        // Get the original file name
        $fileName = $file->getClientOriginalName();

        // Define a path where you want to store the file
        $path = $file->storeAs('documents', $fileName, 'public');

        // Print or log file information
        echo "File uploaded successfully!";
        echo "<pre>";
        print_r($file);
        die;
    } else {
        echo "No file uploaded.";
    }
            
    }

}
