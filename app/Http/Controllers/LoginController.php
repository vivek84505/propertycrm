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


class LoginController extends Controller
{
    //
    public function __construct(){

        
    }

    


    public function index(){
       
        if(!empty(Session::get("userdata"))){
            
            return redirect('/dashboard');
        }  


          return View::make('users.login');
    }


    public function loginprocess(Request $request){
        
        $payload = $request->all();
        $response = [];
       

        if(isset($payload['_token'])){
            unset($payload['_token']);
        }
        // $payload['password'] = bcrypt($payload['password']);
 
        // $user = new UserModel();
        // $res= $user->insert($payload);

        // echo "<pre>";
        // print_r($res);
        // die;
      

        if(Auth::attempt($payload))
        {
            $user = Auth::user();
            $data = array(
                "user_id" => $user->user_id,
                "firstname" => $user->firstname,
                "lastname" => $user->lastname,
                "email" => $user->email,
                "mobile" => $user->mobile,
                "userrole" => $user->userrole,
                "authentication" => true

            );
            Session::put("userdata",$data);
            // return redirect('/dashboard');

           $response['status'] = 'success';
           $response['returnmsg'] = 'Login Success';
        }
        else
        {
             
              $response['status'] = 'fail';
              $response['returnmsg'] = 'Incorrect Username or Password';

            
        }

        return response()->json($response);
         
         
    }

    public function logout(){

        Session::flush();
        
        Auth::logout();

        return redirect('/');
    }

}
