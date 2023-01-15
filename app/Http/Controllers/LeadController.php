<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Helper; 
use Illuminate\Http\Request;
use View;
use Redirect;
use Auth;
use App\Models\LeadModel;
use Response;
use Session;


class LeadController extends Controller
{
    //
    public function index(){

        // echo "<pre>";
        // print_r(Session::get('userdata')['email']);die;
        // Session::get('userdata');
        $states = Helper::getStateAll();
        $leadSourceData = Helper::getLeadSourceAll(); 
        
      
        return View::make('leads.view')->with(['states'=> $states , 'leadSourceData'=> $leadSourceData ]);

    }


   

    public function getleadsAll(Request $request){
      
        $result = [];
        
        $lead = new LeadModel();   
        $leaddata = $lead->getleadsAll();

        if(!empty($leaddata)){
            // $response = $userdata;
           $result = json_decode(json_encode($leaddata), true);

        }

        $states = Helper::getStateAll();
      
       $returnHtml = view('leads.list')->with(['result' => $result , 'states' => $states])->render();

        return response()->json(array('html'=>$returnHtml));


    }

    public function leadById(Request $request){
      
        $response = [];
        $lead = new LeadModel(); 
       
        $payload = $request->all();
        $leadid = $payload['leadid'];
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }
       
        
        $leaddata =  $lead->getleadbyid( ['leadid' => $leadid] );

        if(!empty($leaddata)){
            // $response = $userdata;
           $response = json_decode(json_encode($leaddata), true);

        }

        // echo "<pre>";
        // echo "User data response";
        // print_r($response);die;
 
    // $response = [];
       return response()->json($response); 


    }

    public function leadAdd (Request $request){
        $response = [];
        $user = new LeadModel(); 
       
        $payload = $request->all();
        $units_interested_in = [];
        if(!empty($payload['units_interested_in'])){
            $unitlen = count($payload['units_interested_in']);
            for($i=0; $i<$unitlen; $i++ ){
                $unit = explode('-',$payload['units_interested_in'][$i]);
                $obj = (Object) array($unit[0] => $unit[1]);
                $units_interested_in[$i] = $obj; 
            }
        }
        $units_interested_in = json_encode($units_interested_in);
        $payload['units_interested_in'] = $units_interested_in; 
        // var_dump($units_interested_in);
    //         echo "<pre>";
    //    echo json_encode($units_interested_in);
    //     die;
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }

        if(isset($payload['firstname']) && $payload['firstname'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Firstname is required';
        }

        if(isset($payload['lastname']) && $payload['lastname'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Lastname is required';
        }
        
        if(isset($payload['email']) && $payload['email'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Email is required';
        }

        if(isset($payload['mobile']) && $payload['mobile'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Mobile Number is required';
        }

         if(isset($payload['state']) && $payload['state'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'state is required';
        }

         if(isset($payload['district']) && $payload['district'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'District required';
        }


         if(isset($payload['city']) && $payload['city'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'City is required';
        }
        
        if(isset(Session::get('userdata')['email'])){
            $payload['createdby'] = Session::get('userdata')['email'];
            $payload['created_at'] = date("Y-m-d H:i:s", strtotime('now'));
        }

        

        $response = $user->leadAdd($payload);

        // echo "<pre>";
        // echo "payload";
        // print_r($response);
        // die;
        // echo "<pre>";
        // print_r($response);
        // die;
        return response()->json($response); 

    }
public function detail(Request $request){
    $id = $request->id;
    $parameter = $request->parameter;
  }

    public function leadEdit (Request $request){
        
        $lead = new LeadModel(); 

        $leadid = $request->leadid;  
        $leaddata =  $lead->getleadbyid( ['leadid' => $leadid] );
        
        // echo "<pre>";
        // print_r($leaddata);die;
        //  dd($leaddata);
        
        $states = Helper::getStateAll();
        $leadSourceData = Helper::getLeadSourceAll(); 
        
      
        return View::make('leads.edit')->with(['leaddata'=> $leaddata , 'states'=> $states , 'leadSourceData'=> $leadSourceData ]);

        
        dd($request->all());
        $response = [];
        $existing_data_email = [];
        $existing_data_mobile = [];
        $user = new LeadModel(); 
        
        $payload = $request->all();
        // echo "<pre>";
        // print_r($payload);
        // die;
       
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }

        if(isset($payload['firstname']) && $payload['firstname'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Firstname is required';
            return response()->json($response); 
        }

        if(isset($payload['lastname']) && $payload['lastname'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Lastname is required';
            return response()->json($response); 
        }
        
        if(isset($payload['email']) && $payload['email'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Email is required';
            return response()->json($response); 
        }

        if(isset($payload['mobile']) && $payload['mobile'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Mobile Number is required';
            return response()->json($response); 
        }

         

        // echo "<pre>";
        // print_r($payload);die;

        //Checking existing email 
        $existing_result_email = $user->checExistinglead( [ 'email' => $payload['email']]);

        
        if(!empty($existing_result_email)){          
            $existing_data_email = json_decode(json_encode($existing_result_email[0]), true);           
        }
         
        
        if(!empty($existing_data_email)){
           
            if( $existing_data_email['leadid'] != $payload['leadid']){
                $response['status'] = 'fail';
                $response['returnmsg'] = 'lead with same email alredy exists!';
                return response()->json($response); 
              }
         }
          
          
            //Checking existing Mobile
          $existing_result_mobile = $user->checExistinglead( [ 'mobile' => $payload['mobile']]);

        

          if(!empty($existing_result_mobile)){          
            $existing_data_mobile = json_decode(json_encode($existing_result_mobile[0]), true);           
          }
          
          
          if(!empty($existing_data_mobile)){
           
             if( $existing_data_mobile['leadid'] != $payload['leadid']){
                $response['status'] = 'fail';
                $response['returnmsg'] = 'lead with same mobile alredy exists!';
                return response()->json($response); 
              }
          }
           
         
       
        
        if(isset(Session::get('userdata')['email'])){
            $payload['lastmodifiedby'] = Session::get('userdata')['email'];
            $payload['updated_at'] = date("Y-m-d H:i:s", strtotime('now'));
           
        }

        //  echo "<pre>";
        //  echo "before update";
        // print_r($payload);
        // die;

        $res = $user->leadEdit($payload);
        if($res == 1){

            $response['status'] = 'success';
            $response['returnmsg'] = 'Lead Updated Succesfully!';
        }
       
        return response()->json($response); 

    }


    public function leadDelete (Request $request){
        $response = [];
        $payload = $request->all();
        $lead = new LeadModel(); 
        
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }
 
 
        $res = $lead->leadDelete($payload['leadid']);

        if($res == 1){

            $response['status'] = 'success';
            $response['returnmsg'] = 'Lead Deleted!';
        }
        else{
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Error in deleting Lead Something went wrong!';
        }

         
        return response()->json($response); 

    }

    

}
 