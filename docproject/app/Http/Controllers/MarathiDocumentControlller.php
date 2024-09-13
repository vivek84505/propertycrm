<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Session;
use App\Models\DocumentModel;
use Response;

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

    public function marathidoc_submit(Request $request){

      $data = $request->all();
     
      // echo "<pre>";
      // print_r($data);
      // die;

      $payload  = [];
      $response  = [];
      
      

      if(isset($data['document_type'])){
        $payload['document_type'] = $data['document_type'];
      }

      if(isset($data['document_title'])){
        $payload['document_title'] = $data['document_title'];
      }

      if(isset($data['property_type'])){
        $payload['property_type'] = $data['property_type'];
      }

      if(isset($data['property_consideration_price'])){
        $payload['property_consideration_price'] = $data['property_consideration_price'];
      }

      
      if(isset($data['religious_slogan'])){
        $payload['religious_slogan'] = $data['religious_slogan'];
      }

      if(isset($data['document_execution_date'])){
        $payload['document_execution_date'] = $data['document_execution_date'];
      }

      

      $payload['language'] = 'marathi';

      $document = new DocumentModel(); 
        
      $response = $document->documentAdd($payload);

    return response()->json($response); 

    //    if ($request->hasFile('religious_symbol')) {
    //     // Get the file from the request
    //     $file = $request->file('religious_symbol');

    //     // Get the original file name
    //     $fileName = $file->getClientOriginalName();

    //     // Define a path where you want to store the file
    //     $path = $file->storeAs('documents', $fileName, 'public');

    //     // Print or log file information
    //     echo "File uploaded successfully!";
    //     echo "<pre>";
    //     print_r($file);
    //     die;
    // } else {
    //     echo "No file uploaded.";
    // }
            
    }

}
