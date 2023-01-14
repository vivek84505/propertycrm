<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Helper; 
use Illuminate\Http\Request;
use View;
use Redirect;
use Auth;
use App\Models\CustomerModel;
use Response;
use Session;


class CustomerController extends Controller
{
    //
    public function index(){

        // echo "<pre>";
        // print_r(Session::get('userdata')['email']);die;
        // Session::get('userdata');
        $states = Helper::getStateAll();
         

        return View::make('customers.view')->with('states',$states);

    }


   

    public function getcustomersAll(Request $request){
      
        $result = [];
        
        $customer = new CustomerModel();   
        $customerdata = $customer->getcustomersAll();

        if(!empty($customerdata)){
            // $response = $userdata;
           $result = json_decode(json_encode($customerdata), true);

        }

        $states = Helper::getStateAll();
      
       $returnHtml = view('customers.list')->with(['result' => $result , 'states' => $states])->render();

        return response()->json(array('html'=>$returnHtml));


    }

    public function customersById(Request $request){
      
        $response = [];
        $customer = new CustomerModel(); 
       
        $payload = $request->all();
        $customerid = $payload['customerid'];
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }
       
        
        $userdata =  $customer->getcustomerbyid( ['customerid' => $customerid] );

        if(!empty($userdata)){
            // $response = $userdata;
           $response = json_decode(json_encode($userdata), true);

        }

        // echo "<pre>";
        // echo "User data response";
        // print_r($response);die;
 
    // $response = [];
       return response()->json($response); 


    }

    public function customerAdd (Request $request){
        $response = [];
        $user = new CustomerModel(); 
       
        $payload = $request->all();
        
       
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

        

        $response = $user->customerAdd($payload);

        // echo "<pre>";
        // echo "payload";
        // print_r($response);
        // die;
        // echo "<pre>";
        // print_r($response);
        // die;
        return response()->json($response); 

    }


    public function customersEdit (Request $request){
        $response = [];
        $existing_data_email = [];
        $existing_data_mobile = [];
        $user = new CustomerModel(); 
        
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
        $existing_result_email = $user->checExistingcustomer( [ 'email' => $payload['email']]);

        
        if(!empty($existing_result_email)){          
            $existing_data_email = json_decode(json_encode($existing_result_email[0]), true);           
        }
         
        
        if(!empty($existing_data_email)){
           
            if( $existing_data_email['customerid'] != $payload['customerid']){
                $response['status'] = 'fail';
                $response['returnmsg'] = 'Customer with same email alredy exists!';
                return response()->json($response); 
              }
         }
          
          
            //Checking existing Mobile
          $existing_result_mobile = $user->checExistingcustomer( [ 'mobile' => $payload['mobile']]);

        

          if(!empty($existing_result_mobile)){          
            $existing_data_mobile = json_decode(json_encode($existing_result_mobile[0]), true);           
          }
          
          
          if(!empty($existing_data_mobile)){
           
             if( $existing_data_mobile['customerid'] != $payload['customerid']){
                $response['status'] = 'fail';
                $response['returnmsg'] = 'Customer with same mobile alredy exists!';
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

        $res = $user->customerEdit($payload);
        if($res == 1){

            $response['status'] = 'success';
            $response['returnmsg'] = 'Client Updated Succesfully!';
        }
       
        return response()->json($response); 

    }


    public function customersDelete (Request $request){
        $response = [];
        $payload = $request->all();
        $customer = new CustomerModel(); 
        
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }
 
 
        $res = $customer->customerDelete($payload['customerid']);

        if($res == 1){

            $response['status'] = 'success';
            $response['returnmsg'] = 'Client Deleted!';
        }
        else{
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Error in deleting Client Something went wrong!';
        }

         
        return response()->json($response); 

    }

    public function changepassword(Request $request){

      


        $response = [];
        $currentUserPayload = [];
        $payload = $request->all();
        $user = new CustomerModel();
        
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
 