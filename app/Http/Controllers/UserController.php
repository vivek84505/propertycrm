<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

 
use Illuminate\Http\Request;
use View;
use Redirect;
use Auth;
use App\Models\UserModel;
use Response;
use Session;


class UserController extends Controller
{
    //
    public function index(){

        // echo "<pre>";
        // print_r(Session::get('userdata')['email']);die;
        // Session::get('userdata');

        

        return View::make('users.view');

    }


    public function  profile(){
      $userdata = [];  
      $user_id = Session::get("userdata")['user_id'];  
      $user = new UserModel();
      $payload['user_id'] = $user_id;  
      $res = $user->getuserbyid($payload);
      
    
      if(!empty($res)){
          
        $userdata = json_decode(json_encode($res), true);
       //
      }
 
    //   echo "<pre>";
    //   print_r($userdata);die;
      
      return View::make('users.profile',compact('userdata'));

    }

    public function getuserAll(Request $request){
      
        $result = [];
        
        $user = new UserModel();   
        $userdata = $user->getuserAll();

        if(!empty($userdata)){
            // $response = $userdata;
           $result = json_decode(json_encode($userdata), true);

        }

      
       $returnHtml = view('users.list')->with('result',$result)->render();

        return response()->json(array('html'=>$returnHtml));


    }

    public function getuserById(Request $request){
      
        $response = [];
        $user = new UserModel(); 
       
        $payload = $request->all();
        $user_id = $payload['userid'];
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }
       
        
        $userdata =  $user->getuserbyid( ['user_id' => $user_id] );

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

    public function userAdd (Request $request){
        $response = [];
        $user = new UserModel(); 
       
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

        if(isset($payload['userrole']) && $payload['userrole'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'User Role is required';
        }
        
        if(isset(Session::get('userdata')['email'])){
            $payload['createdby'] = Session::get('userdata')['email'];
            $payload['created_at'] = date("Y-m-d H:i:s", strtotime('now'));
        }


        $response = $user->userAdd($payload);
        // echo "<pre>";
        // print_r($response);
        // die;
        return response()->json($response); 

    }


    public function userEdit (Request $request){
        $response = [];
        $existing_data_email = [];
        $existing_data_mobile = [];
        $user = new UserModel(); 
        
        $payload = $request->all();
 
       
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

        if(isset($payload['userrole']) && $payload['userrole'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'User Role is required';
            return response()->json($response); 
        }

        // echo "<pre>";
        // print_r($payload);die;

        //Checking existing email 
        $existing_result_email = $user->checExistinguser( [ 'email' => $payload['email']]);

        
        if(!empty($existing_result_email)){          
            $existing_data_email = json_decode(json_encode($existing_result_email[0]), true);           
        }
         
        
        if(!empty($existing_data_email)){
           
            if( $existing_data_email['user_id'] != $payload['user_id']){
                $response['status'] = 'fail';
                $response['returnmsg'] = 'User with same email alredy exists!';
                return response()->json($response); 
              }
         }
          
          
            //Checking existing Mobile
          $existing_result_mobile = $user->checExistinguser( [ 'mobile' => $payload['mobile']]);

        

          if(!empty($existing_result_mobile)){          
            $existing_data_mobile = json_decode(json_encode($existing_result_mobile[0]), true);           
          }
          
          
          if(!empty($existing_data_mobile)){
           
             if( $existing_data_mobile['user_id'] != $payload['user_id']){
                $response['status'] = 'fail';
                $response['returnmsg'] = 'User with same mobile alredy exists!';
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

        $res = $user->userEdit($payload);
        if($res == 1){

            $response['status'] = 'success';
            $response['returnmsg'] = 'User Updated Succesfully!';
        }
       
        return response()->json($response); 

    }


    public function userDelete (Request $request){
        $response = [];
        $payload = $request->all();
        $user = new UserModel(); 
        
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }

        if($payload['userid'] == 1){

            $response['status'] = 'fail';
            $response['returnmsg'] = 'User ID 1 cannot be Deleted!';
            return response()->json($response); 
        }
        
 
        $res = $user->userDelete($payload['userid']);

        if($res == 1){

            $response['status'] = 'success';
            $response['returnmsg'] = 'User Deleted!';
        }
        else{
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Error in deleting user Something went wrong!';
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
 