<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\master;

 
use Illuminate\Http\Request;
use View;
use Redirect;
use Auth;
use App\Models\LeadStatusModel;
use Response;
use Session;


class LeadStatusController extends Controller
{
    //
    public function index(){
 

        return View::make('master.leadstatus.view');
     }

 

    public function leadstatusgetAll(Request $request){
      
        $result = [];
        
        $leadstatus = new LeadStatusModel();   
        $leadstatusdata = $leadstatus->leadstatusAll();

        if(!empty($leadstatusdata)){
            // $response = $userdata;
           $result = json_decode(json_encode($leadstatusdata), true);

        }
         
      
       $returnHtml = view('master.leadstatus.list')->with('result',$result)->render();

        return response()->json(array('html'=>$returnHtml));


    }

    public function getleadstatusById(Request $request){
      
        $response = [];
        $leadstatus = new LeadStatusModel(); 
       
        $payload = $request->all();
        $leadstatusid = $payload['leadstatusid'];
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }
       
        
        $leadstatusdata =  $leadstatus->getleadstatusbyid( ['leadstatusid' => $leadstatusid] );

        if(!empty($leadstatusdata)){
            
           $response = json_decode(json_encode($leadstatusdata), true);

        }
        
       return response()->json($response); 


    }

    public function leadstatusaddAdd (Request $request){
        $response = [];
        $leadstatus = new LeadStatusModel(); 
       
       
        $payload = $request->all();
        
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }

        if(isset($payload['leadstatus']) && $payload['leadstatus'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Lead status is required';
        }

        if(isset(Session::get('userdata')['email'])){
            $payload['createdby'] = Session::get('userdata')['email'];
            $payload['createddate'] = date("Y-m-d H:i:s", strtotime('now'));
        }
        
        // echo "<pre>";
        // print_r($payload);
        // die;
        $response = $leadstatus->leadstatusAdd($payload);
        
        return response()->json($response); 

    }


    public function leadstatusEdit (Request $request){
        
        $response = [];
        $existing_data_leadstatus = [];
        
        $leadstatus = new LeadStatusModel(); 
        
        $payload = $request->all();
        
       

       
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }

       

        if(isset($payload['leadstatus']) && $payload['leadstatus'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Leadstatus is required';
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
          
       
        

        $res = $leadstatus->leadstatusEdit($payload);

       
        if($res == 1){

            $response['status'] = 'success';
            $response['returnmsg'] = 'Leadstatus Updated Succesfully!';
        }
       
        return response()->json($response); 

    }


    public function leadstatusDelete (Request $request){
        $response = [];
        $payload = $request->all();
        $leadstatus = new LeadStatusModel(); 
        
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }
      
        $res = $leadstatus->leadstatusDelete($payload['leadstatusid']);
        
        if($res == 1){

            $response['status'] = 'success';
            $response['returnmsg'] = 'Lead status Deleted!';
        }
        else{
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Error in deleting Leadstatus Something went wrong!';
        }

         
        return response()->json($response); 

    }

    

}
 