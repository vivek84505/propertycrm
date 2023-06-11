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
        
       
        // $query = DB::table('tbl_leadmaster');
 
        // if(isset($payload['email']) && !empty($payload['email']))
        //     $query->where('email', $payload['email']);

        // if(isset($payload['mobile']) && !empty($payload['mobile']))
        // $query->where('mobile', $payload['mobile']);

        // if(isset($payload['leadid']) && !empty($payload['leadid']))
        // $query->where('leadid', $payload['leadid']);

          $leaddata = DB::table('tbl_leadmaster')
                    ->select('tbl_customer.firstname','tbl_customer.lastname','tbl_customer.email','tbl_customer.mobile','tbl_leadmaster.leadid','tbl_leadmaster.leadstatus','tbl_leadmaster.leadsource','tbl_leadmaster.units_interested_in','tbl_leadmaster.project_interested_in','tbl_leadmaster.customer_budget_min','tbl_leadmaster.customer_budget_max','tbl_leadmaster.floor_preference','tbl_leadmaster.lead_description','tbl_leadmaster.isactive','tbl_leadmaster.leadassignedto','tbl_leadmaster.is_opportunity','tbl_leadmaster.created_at','tbl_leadmaster.updated_at','tbl_leadmaster.createdby','tbl_leadmaster.lastmodifiedby','tbl_leadmaster.address','tbl_leadmaster.state','tbl_leadmaster.district','tbl_leadmaster.city','tbl_leadmaster.isdeleted','tbl_leadmaster.property_type','tbl_leadmaster.loan_required','tbl_leadmaster.next_followup_date','tbl_leadmaster.visit_date','tbl_leadmaster.customerid')
                    ->join('tbl_customer','tbl_customer.customerid','=','tbl_leadmaster.customerid')
                    ->where('tbl_leadmaster.leadid', $payload['leadid'])
                    ->get()->first();

        //  $leaddata = $query->get()->first();
        
        
        

        if(!empty($leaddata)){
            $res = $leaddata;
        }
        
        return $res;
    }

    public function getleadsAll(){
        $response = [];

        // $userdata = LeadModel::select('leadid','firstname','lastname','email','mobile','alt_mobile','state','address','city','created_at','createdby')->where('isdeleted','0')->get();
         
        $userdata = DB::table('tbl_leadmaster')
                    ->select('tbl_customer.firstname','tbl_customer.lastname','tbl_customer.email','tbl_customer.mobile','tbl_leadmaster.leadstatus','tbl_leadmaster.created_at' ,'tbl_leadmaster.createdby','tbl_leadmaster.leadid')
                    ->join('tbl_customer','tbl_customer.customerid','=','tbl_leadmaster.customerid')
                    ->get();


        if(!empty($userdata)){
            $response = $userdata;
        }

        return $response;
           

    }


     public function leadsearchAll($payload){
        
        // $response = []; 
        // $userdata = LeadModel::select('leadid','firstname','lastname','email','mobile','alt_mobile','state','address','city','created_at','createdby')->where('isdeleted','0')->get();
          
        // if(!empty($userdata)){
        //     $response = $userdata;
        // } 
        // return $response;
        
        // echo "<pre>";
        // print_r($payload);
        // die;

        $response = [];
            
       
        // $query = DB::table('tbl_leadmaster');
        
        $query = DB::table('tbl_leadmaster')
                    ->select('tbl_customer.firstname','tbl_customer.lastname','tbl_customer.email','tbl_customer.mobile','tbl_leadmaster.leadid','tbl_leadmaster.leadstatus','tbl_leadmaster.leadsource','tbl_leadmaster.units_interested_in','tbl_leadmaster.project_interested_in','tbl_leadmaster.customer_budget_min','tbl_leadmaster.customer_budget_max','tbl_leadmaster.floor_preference','tbl_leadmaster.lead_description','tbl_leadmaster.isactive','tbl_leadmaster.leadassignedto','tbl_leadmaster.is_opportunity','tbl_leadmaster.created_at','tbl_leadmaster.updated_at','tbl_leadmaster.createdby','tbl_leadmaster.lastmodifiedby','tbl_leadmaster.address','tbl_leadmaster.state','tbl_leadmaster.district','tbl_leadmaster.city','tbl_leadmaster.isdeleted','tbl_leadmaster.property_type','tbl_leadmaster.loan_required','tbl_leadmaster.next_followup_date','tbl_leadmaster.visit_date','tbl_leadmaster.customerid')
                    ->leftJoin('tbl_customer','tbl_customer.customerid','=','tbl_leadmaster.customerid')
                    ->join('tbl_state','tbl_state.state_id','=','tbl_leadmaster.state')
                    ->join('tbl_district','tbl_district.district_id','=','tbl_leadmaster.district');;
                   
                   


        // $query->select('leadid','firstname','lastname','email','mobile','alt_mobile','state','address','city','created_at','createdby')->where('isdeleted','0');

        if(isset($payload['leadsource']) && !empty($payload['leadsource'])){
            
            $query->where('leadsource', $payload['leadsource']);
        }

        if(isset($payload['property_type']) && !empty($payload['property_type'])){
            
            $query->where('property_type', $payload['property_type']);
        }

        

        if(isset($payload['state']) && !empty($payload['state'])) {
            $query->whereRaw("tbl_leadmaster.state = '" . $payload['state'] . "'");
        }

        if(isset($payload['district']) && !empty($payload['district'])) {
            $query->whereRaw("tbl_leadmaster.district = '" . $payload['district'] . "'");
        }
            
       if(isset($payload['next_followup_date']) && !empty($payload['next_followup_date'])) {
            $query->whereRaw("DATE(next_followup_date) = '" . $payload['next_followup_date'] . "'");
       }

       if(isset($payload['visit_date']) && !empty($payload['visit_date'])) {
            $query->whereRaw("DATE(visit_date) = '" . $payload['visit_date'] . "'");
        }
        
    //     print_r($payload);
    //     die;

    //     $sql = $query->toSql();
    //     //  echo $payload['next_followup_date'];
    //     print_r($sql);
    //    die;
    
                
      
      
        $leaddata = $query->get();
        
        
        // echo $payload['next_followup_date'];
        // print_r($leaddata);
        // die;
        
        if(!empty($leaddata)){
            $response = json_decode(json_encode($leaddata), true); 
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
