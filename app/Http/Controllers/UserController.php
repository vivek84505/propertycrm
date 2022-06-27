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
      
      return View::make('profile',compact('userdata'));

    }
}
 