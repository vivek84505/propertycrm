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

        

        return View::make('users.users_management');

    }


    public function  profile(){
      $userdata = [];  
      $user_id = Session::get("userdata")['user_id'];  
      $user = new UserModel();
   
      $res = $user->getuserbyid($user_id);
      
    
      if(!empty($res)){
          
        $userdata = json_decode(json_encode($res), true);
       
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

        // $result = [];
    //   echo "<pre>";
    //   print_r($result);die;
       $returnHtml = view('users.userlist')->with('result',$result)->render();

        return response()->json(array('html'=>$returnHtml));


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
            $payload['createddate'] = date("Y-m-d H:i:s", strtotime('now'));
        }


        $response = $user->userAdd($payload);
        // echo "<pre>";
        // print_r($response);
        // die;
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



}
 