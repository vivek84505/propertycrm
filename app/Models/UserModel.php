<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
use Hash;


class UserModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
 
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getuserbyid($payload){
        $res = [];
        $user = new UserModel();  
       
        $query = DB::table('users');

        if(isset($payload['email']) && !empty($payload['email']))
            $query->where('email', $payload['email']);

        if(isset($payload['mobile']) && !empty($payload['mobile']))
        $query->where('mobile', $payload['mobile']);

        if(isset($payload['user_id']) && !empty($payload['user_id']))
        $query->where('user_id', $payload['user_id']);


        $userdata = $query->get();
        
        
        

        if(!empty($userdata)){
            $res = $userdata;
        }
        
        return $res;
    }

    public function getuserAll(){
        $response = [];

        $userdata = User::select('user_id','firstname','lastname','email','mobile','userrole','created_at','createdby')->get();
         
        
        if(!empty($userdata)){
            $response = $userdata;
        }

        return $response;
           

    }


    public function userDelete($user_id){

         return $deleteResult = User::where('user_id',$user_id)->delete(); 
        
    }

    public function checExistinguser($payload){

       
        $res = [];
        $user = new UserModel();  
       
        $query = DB::table('users');

        

        if(isset($payload['email']) && !empty($payload['email'])){
            
            $query->where('email', $payload['email']);
        }
          
        
        if(isset($payload['mobile']) && !empty($payload['mobile'])){  
            
            $query->orwhere('mobile', $payload['mobile']); 
        }
       

         
       
      
        $userdata = $query->get();
        
         
        if(!empty($userdata)){
            $res = json_decode(json_encode($userdata), true); 
        }

        
        return $res;

    }


    public function userEdit($payload){

       $userid = $payload['user_id'];

       if(isset($payload['user_id'])){
         unset($payload['user_id']);
       }

       if(isset($payload['mobile']) && !empty($payload['mobile'])){
            $payload['password'] = bcrypt($payload['mobile']);
       }
      
       $res = User::where('user_id',$userid)->update($payload);
       return $res; 

    }


    public function userAdd($payload){
        // echo "<pre>";
        // print_r($payload);die;
        $Modelresponse = [];
        $existing_userdata = [];
        $sqlQueryResult =  User::select('email','mobile')->where('email', $payload['email'])->orWhere('mobile', $payload['mobile'])->first();
        
        if(!empty($sqlQueryResult)){
            $existing_userdata = json_decode(json_encode($sqlQueryResult), true);

            if($payload['email'] === $existing_userdata['email'] ){
                $Modelresponse['status'] = 'fail';
                $Modelresponse['returnmsg'] = 'User with this email already exists';
            }

            if($payload['mobile'] === $existing_userdata['mobile'] ){
                $Modelresponse['status'] = 'fail';
                $Modelresponse['returnmsg'] = 'User with this Mobile already exists';
            } 
        } else
        {
            $payload['password'] = bcrypt($payload['mobile']);
            $user = new UserModel();
            $res= $user->insert($payload);
           
            if(!$res){

                $Modelresponse['status'] = 'fail';
                $Modelresponse['returnmsg'] = 'Something Went Wrong';
            }
            else{
                
                $Modelresponse['status'] = 'success';
                $Modelresponse['returnmsg'] = 'User Added Succesfully';
            }
             

        } 
       
        return $Modelresponse;
        

    }



    public function changePassword($payload){
 
 
        if(isset($payload['password']) && !empty($payload['password'])){
             $payload['password'] = bcrypt($payload['password']);
        }
       
        $res = User::where('user_id',$payload['user_id'])->update($payload);
        return $res; 
 
     }


     public function getuserpassword($user_id){

        $response = [];
        $user = new UserModel();   
       
          $userdata =  User::select('*')->where('user_id', $user_id)->first();
       
         $data = json_decode(json_encode($userdata), true); 

        echo "userdata";
        echo "<pre>";
        print_r($data);die;

        if(!empty($userdata)){
            $response = $userdata;
        } 
        return $response;
    }


  


}
