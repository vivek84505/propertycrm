<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
use Hash;


class LeadModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tbl_leadmaster';
    protected $primaryKey = 'leadid';
    
  

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

    public function getleadbyid($payload){
        $res = [];
        $leaddata = [];
        $lead = new LeadModel();  
        
       
        $query = DB::table('tbl_leadmaster');
 
        if(isset($payload['email']) && !empty($payload['email']))
            $query->where('email', $payload['email']);

        if(isset($payload['mobile']) && !empty($payload['mobile']))
        $query->where('mobile', $payload['mobile']);

        if(isset($payload['leadid']) && !empty($payload['leadid']))
        $query->where('leadid', $payload['leadid']);


        $leaddata = $query->get()->first();
        
        
        

        if(!empty($leaddata)){
            $res = $leaddata;
        }
        
        return $res;
    }

    public function getleadsAll(){
        $response = [];

        $userdata = LeadModel::select('leadid','firstname','lastname','email','mobile','alt_mobile','state','address','city','created_at','createdby')->where('isdeleted','0')->get();
         
        
        if(!empty($userdata)){
            $response = $userdata;
        }

        return $response;
           

    }


    public function leadDelete($leadid){

        $payload['leadid'] = $leadid;
        $payload['isdeleted'] = 1;
       
         return $deleteResult = LeadModel::where('leadid',$leadid)->update($payload);
        
    }

    public function checExistinglead($payload){

       
        $res = [];
        $user = new LeadModel();  
       
        $query = DB::table('tbl_leadmaster');

        

        if(isset($payload['email']) && !empty($payload['email'])){
            
            $query->where('email', $payload['email']);
        }
          
        
        if(isset($payload['mobile']) && !empty($payload['mobile'])){  
            
            $query->orwhere('mobile', $payload['mobile']); 
        }
       

         
       
      
        $leaddata = $query->get();
        
         
        if(!empty($leaddata)){
            $res = json_decode(json_encode($leaddata), true); 
        }

        
        return $res;

    }


    public function leadEdit($payload){

       $leadid = $payload['leadid'];

       if(isset($payload['leadid'])){
         unset($payload['leadid']);
       }
 
      
       $res = LeadModel::where('leadid',$leadid)->update($payload);
       return $res; 

    }


    public function leadAdd($payload){
       
        $Modelresponse = [];
        $existing_leaddata = [];

            
            
            $user = new LeadModel();
            $res= $user->insert($payload);
           
            if(!$res){

                $Modelresponse['status'] = 'fail';
                $Modelresponse['returnmsg'] = 'Something Went Wrong';
            }
            else{
                
                $Modelresponse['status'] = 'success';
                $Modelresponse['returnmsg'] = 'lead Added Succesfully';
            }
             
 
        return $Modelresponse;
        

    }


    public function leadEditSave($payload){
 
        $response = [];
        $res = LeadModel::where('leadid',$payload['leadid'])->update($payload);
        
        if(!$res){

            $response['status'] = 'fail';
            $response['returnmsg'] = 'Something Went Wrong';
        }
        else{

            $response['status'] = 'success';
            $response['returnmsg'] = 'lead Updated Succesfully';
        }
        
        return $response; 

    }

 


}
