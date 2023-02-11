<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
use Hash;


class LeadStatusModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tbl_leadstatusmaster';
    protected $primaryKey = 'leadstatusid';
    public $timestamps = false;

  

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

    public function getleadstatusbyid($payload){
        $res = [];
        $user = new UserModel();  
       
        $query = DB::table('tbl_leadstatusmaster');
       
        if(isset($payload['leadstatusid']) && !empty($payload['leadstatusid']))
        $query->where('leadstatusid', $payload['leadstatusid']);
        $leadstatusdata = $query->get();
        

        if(!empty($leadstatusdata)){
            $res = $leadstatusdata;
        }
        
        return $res;
    }

    public function leadstatusAll(){
        $response = [];

        $leadstatusdata = LeadStatusModel::select('leadstatusid','leadstatus','isactive','createdby','createddate','lastmodifiedby','lastmodifieddate')->get()->toArray();
         
       
        if(!empty($leadstatusdata)){
            $response = $leadstatusdata;
        }

        return $response;
           

    }


    public function leadstatusDelete($leadstatusid){

        return $deleteResult = LeadStatusModel::where('leadstatusid',$leadstatusid)->delete(); 
    }

    

    public function leadstatusEdit($payload){

       $leadstatusid = $payload['leadstatusid'];

       if(isset($payload['leadstatusid'])){
         unset($payload['leadstatusid']);
       }
       
       $res = LeadStatusModel::where('leadstatusid',$leadstatusid)->update($payload);
       
       return $res; 

    }


    public function leadstatusAdd($payload){
       
        $Modelresponse = [];
        $existing_leadstatusdata = [];
        $sqlQueryResult =  LeadStatusModel::select('leadstatus')->where('leadstatus', $payload['leadstatus'])->first();
        
        if(!empty($sqlQueryResult)){
            $existing_leadstatusdata = json_decode(json_encode($sqlQueryResult), true);

            if($payload['leadstatus'] === $existing_leadstatusdata['leadstatus'] ){
                $Modelresponse['status'] = 'fail';
                $Modelresponse['returnmsg'] = 'This Lead Status already exists';
            } 
            
        } else
        {
            
            $leadstatus = new LeadStatusModel();
            $res= $leadstatus->insert($payload);
           
            if(!$res){

                $Modelresponse['status'] = 'fail';
                $Modelresponse['returnmsg'] = 'Something Went Wrong';
            }
            else{
                
                $Modelresponse['status'] = 'success';
                $Modelresponse['returnmsg'] = 'Lead Status Added Succesfully';
            }
        } 
        
        return $Modelresponse;
    }

 


}
