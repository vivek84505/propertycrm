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
        // $res = User->where('user_id', $user_id)->first();
        if(!empty($userdata)){
            $res = $userdata;
        }
        
        return $res;
    }

    public function getuserAll(){
        $response = [];

        $userdata = User::select('firstname','lastname','email','mobile','userrole','createddate','createdby')->get();
         

        if(!empty($userdata)){
            $response = $userdata;
        }

        return $response;
       
       

    }



}
