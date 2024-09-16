<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Session;
use App\Models\DocumentModel;
use App\Models\DocumentPartyModel;
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
      $party_add_response  = [];
      
      

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
      $partymodel = new DocumentPartyModel(); 
        
      $response = $document->documentAdd($payload);

      //Pakshakar Data Add Start
      if(!empty($response['last_insert_id'])){
        
        
        $partylength = count($data['party_type']);
        $documentid = $response['last_insert_id'];

        for($i = 0; $i < $partylength; $i++){

          $party_payload = [];

          $party_payload['document_id'] = $documentid;
          
          if(!empty($data['party_type'][$i])) {  $party_payload['party_type']  = $data['party_type'][$i]; }
          if(!empty($data['party_sirname'][$i])) {  $party_payload['party_sirname']  = $data['party_sirname'][$i]; }
          if(!empty($data['party_firstname'][$i])) {  $party_payload['party_firstname']  = $data['party_firstname'][$i]; }
          if(!empty($data['party_middlename'][$i])) {  $party_payload['party_middlename']  = $data['party_middlename'][$i]; }
          if(!empty($data['party_birthdate'][$i])) {  $party_payload['party_birthdate']  = $data['party_birthdate'][$i]; }
          if(!empty($data['party_gender'][$i])) {  $party_payload['party_gender']  = $data['party_gender'][$i]; }
          if(!empty($data['party_profession'][$i])) {  $party_payload['party_profession']  = $data['party_profession'][$i]; }
          if(!empty($data['party_pancard'][$i])) {  $party_payload['party_pancard']  = $data['party_pancard'][$i]; }
          if(!empty($data['party_adharcard'][$i])) {  $party_payload['party_adharcard']  = $data['party_adharcard'][$i]; }
          if(!empty($data['party_cin'][$i])) {  $party_payload['party_cin']  = $data['party_cin'][$i]; }
          if(!empty($data['party_registration_number'][$i])) {  $party_payload['party_registration_number']  = $data['party_registration_number'][$i]; }
          if(!empty($data['party_registration_date'][$i])) {  $party_payload['party_registration_date']  = $data['party_registration_date'][$i]; }
          if(!empty($data['party_mobile'][$i])) {  $party_payload['party_mobile']  = $data['party_mobile'][$i]; }
          if(!empty($data['party_email'][$i])) {  $party_payload['party_email']  = $data['party_email'][$i]; }
          if(!empty($data['party_address_buildingname'][$i])) {  $party_payload['party_address_buildingname']  = $data['party_address_buildingname'][$i]; }
          if(!empty($data['party_address_flatno'][$i])) {  $party_payload['party_address_flatno']  = $data['party_address_flatno'][$i]; }
          if(!empty($data['party_address_floorno'][$i])) {  $party_payload['party_address_floorno']  = $data['party_address_floorno'][$i]; }
          if(!empty($data['party_address_road'][$i])) {  $party_payload['party_address_road']  = $data['party_address_road'][$i]; }
          if(!empty($data['party_address_location'][$i])) {  $party_payload['party_address_location']  = $data['party_address_location'][$i]; }
          if(!empty($data['party_address_pincode'][$i])) {  $party_payload['party_address_pincode']  = $data['party_address_pincode'][$i]; }
          if(!empty($data['party_address_state'][$i])) {  $party_payload['party_address_state']  = $data['party_address_state'][$i]; }
          if(!empty($data['party_address_district'][$i])) {  $party_payload['party_address_district']  = $data['party_address_district'][$i]; }
          if(!empty($data['party_lihun_ghenar_hissa'][$i])) {  $party_payload['party_lihun_ghenar_hissa']  = $data['party_lihun_ghenar_hissa'][$i]; }
          if(!empty($data['party_number'][$i])) {  $party_payload['party_number']  = $data['party_number'][$i]; }

 

           if(!empty($party_payload)){

            $party_add_response = $partymodel->documentPartyAdd($party_payload);

          }
        }

       


      }
      // echo "<pre>";
      // print_r($party_add_response);
      // die;

      //Pakshakar Data Add End

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
