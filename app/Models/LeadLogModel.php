<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
use Hash;


class LeadLogModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tbl_leadlogs';
    protected $primaryKey = 'leadlogid';
    
  

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
        'email_verified_at' => 'datetime'
         
    ];

    
       
      public function getleadloglist($payload){
        $res = [];
       
        $leadlogdata = []; 
       
        $query = DB::table('tbl_leadlogs');

        if(isset($payload['leadid']) && !empty($payload['leadid']))
            $query->where('leadid', $payload['leadid'])->orderBy('createddate', 'DESC');
 

        $leadlogdata = $query->get();
         

        if(!empty($leadlogdata)){
            $res = $leadlogdata;
        }
        
        return $res;
    }






     public function leadRemarkAdd($payload){
       
        $Modelresponse = [];
        $existing_leaddata = [];

            
            
            $user = new LeadLogModel();
            $res= $user->insert($payload);
           
            if(!$res){

                $Modelresponse['status'] = 'fail';
                $Modelresponse['returnmsg'] = 'Something Went Wrong';
            }
            else{
                
                $Modelresponse['status'] = 'success';
                $Modelresponse['returnmsg'] = 'lead Remark Added Succesfully';
            }
             
 
        return $Modelresponse;
        

    }


}
