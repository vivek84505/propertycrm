<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    public function getuserbyid($user_id){
        $res = [];

        $userdata = User::select('firstname','lastname','email','mobile','userrole','createddate','createdby')->where('user_id', $user_id)->first();
         
        //  echo "<pre>";
        //  print_r($userdata);die;


        if(!empty($userdata)){
            $res = $userdata;
        }
        
        return $res;
    }

    public function getuserAll(){
        $response = [];

        $userdata = User::select('user_id','firstname','lastname','email','mobile','userrole','createddate','createdby')->get();
         
        
        if(!empty($userdata)){
            $response = $userdata;
        }

        return $response;
           

    }


    public function userDelete($user_id){

         return $deleteResult = User::where('user_id',$user_id)->delete(); 
        
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

        // echo "<pre>";
        // echo "Modelresponse";
        // print_r($Modelresponse);

        // die;

        return $Modelresponse;
       
       

    }



}
