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


    public function  profile(){
      $userdata = [];  
      $user_id = Session::get("userdata")['user_id'];  
      $user = new UserModel();
      $payload['user_id'] = $user_id;  
      $res = $user->getuserbyid($payload);
      
    
      if(!empty($res)){
          
        $userdata = json_decode(json_encode($res), true);
       
      }
 
    //   echo "<pre>";
    //   print_r($userdata);die;
      
      return View::make('users.profile',compact('userdata'));

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


        // echo "<pre>";
        // print_r($payload);
        // die;
         

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

    public function changepassword(Request $request){

      


        $response = [];
        $currentUserPayload = [];
        $payload = $request->all();
        $user = new UserModel();
        
        // echo "<pre>";
        // print_r($payload); die;

        if(isset($payload['_token'])){
            unset($payload['_token']);
        }

        if($payload['current_password'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Current Password is required';
            return response()->json($response); 
        }

        if($payload['new_password'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'New Password is required';
            return response()->json($response); 
        }

        if($payload['confirm_password'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Confirm Password is required';
            return response()->json($response); 
        }

        

        if( isset($payload['current_password']) && !empty($payload['current_password']) ){
            
            $currentUserPayload['email'] =  Session::get('userdata')['email'];
            $currentUserPayload['password'] = $payload['current_password'];
            
            if(!Auth::attempt($currentUserPayload)){

                $response['status'] = 'fail';
                $response['returnmsg'] = 'Current Password is incorrect';
                return response()->json($response); 
            }
          
        }



        if(isset($payload['new_password']) && isset($payload['confirm_password']) ){
            if($payload['new_password'] != $payload['confirm_password']){
                $response['status'] = 'fail';
                $response['returnmsg'] = 'New password and confirm password mismatch.';
                return response()->json($response); 
            }
           
        }
       

        $changepassword_payload['password'] = $payload['new_password'];
        $changepassword_payload['user_id'] = $payload['user_id'];
         
       
        $res = $user->changePassword($changepassword_payload); 
        if($res == 1){

            $response['status'] = 'success';
            $response['returnmsg'] = 'Password Updated Succesfully!';
        }




        return response()->json($response); 

    }

}
 