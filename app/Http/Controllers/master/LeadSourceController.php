<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\master;

 
use Illuminate\Http\Request;
use View;
use Redirect;
use Auth;
use App\Models\LeadSourceModel;
use Response;
use Session;


class LeadSourceController extends Controller
{
    //
    public function index(){
 

        return View::make('master.leadsource.view');
     }

 

    public function leadsourceAll(Request $request){
      
        $result = [];
        
        $leadsource = new LeadSourceModel();   
        $leadsourcedata = $leadsource->leadsourceAll();

        if(!empty($leadsourcedata)){
            // $response = $userdata;
           $result = json_decode(json_encode($leadsourcedata), true);

        }
        // echo "<pre>";
        // print_r($result);die;
      
       $returnHtml = view('master.leadsource.list')->with('result',$result)->render();

        return response()->json(array('html'=>$returnHtml));


    }

    public function getleadsourceById(Request $request){
      
        $response = [];
        $leadsource = new LeadSourceModel(); 
       
        $payload = $request->all();
        $leadsourceid = $payload['leadsourceid'];
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }
       
        
        $leadsourcedata =  $leadsource->getleadsourcebyid( ['leadsourceid' => $leadsourceid] );

        if(!empty($leadsourcedata)){
            
           $response = json_decode(json_encode($leadsourcedata), true);

        }
        
       return response()->json($response); 


    }

    public function leadsourceAdd (Request $request){
        $response = [];
        $leadsource = new LeadSourceModel(); 
       
       
        $payload = $request->all();
        
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }

        if(isset($payload['leadsource']) && $payload['leadsource'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Leadsource is required';
        }

        if(isset(Session::get('userdata')['email'])){
            $payload['createdby'] = Session::get('userdata')['email'];
            $payload['createddate'] = date("Y-m-d H:i:s", strtotime('now'));
        }
 

        $response = $leadsource->leadsourceAdd($payload);
        
        return response()->json($response); 

    }


    public function leadsourceEdit (Request $request){
        
        $response = [];
        $existing_data_leadsource = [];
        
        $leadsource = new LeadSourceModel(); 
        
        $payload = $request->all();
        
       

       
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }

       

        if(isset($payload['leadsource']) && $payload['leadsource'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Leadsource is required';
            return response()->json($response); 
        }

        if(isset($payload['isactive']) && $payload['isactive'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Status is required';
            return response()->json($response); 
        }
        

        if(isset(Session::get('userdata')['email'])){
            $payload['lastmodifiedby'] = Session::get('userdata')['email'];
            $payload['lastmodifieddate'] = date("Y-m-d H:i:s", strtotime('now'));
           
        }
          
       
        

        $res = $leadsource->leadsourceEdit($payload);

       
        if($res == 1){

            $response['status'] = 'success';
            $response['returnmsg'] = 'Leadsource Updated Succesfully!';
        }
       
        return response()->json($response); 

    }


    public function leadsourcDelete (Request $request){
        $response = [];
        $payload = $request->all();
        $leadsource = new LeadSourceModel(); 
        
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }
      
        $res = $leadsource->leadsourcDelete($payload['leadsourceid']);
        
        if($res == 1){

            $response['status'] = 'success';
            $response['returnmsg'] = 'Leadsource Deleted!';
        }
        else{
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Error in deleting Leadsource Something went wrong!';
        }

         
        return response()->json($response); 

    }

    

}
 