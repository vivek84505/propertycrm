<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
use Hash;


class CustomerModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tbl_customer';
    protected $primaryKey = 'customerid';
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

    public function getleadsourcebyid($payload){
        $res = [];
        $user = new UserModel();  
       
        $query = DB::table('tbl_leadsourcemaster');
       
        if(isset($payload['leadsourceid']) && !empty($payload['leadsourceid']))
        $query->where('leadsourceid', $payload['leadsourceid']);
        $userdata = $query->get();
        

        if(!empty($userdata)){
            $res = $userdata;
        }
        
        return $res;
    }

    public function customersGetAll($payload){
       
       $response = []; 
       
    //    $firstname = $payload['firstname'];  
       
    //    $customerdata = DB::select("SELECT customerid,firstname,lastname FROM `tbl_customer` WHERE CONCAT(firstname, ' ', lastname) LIKE '%$firstname%'");
        
       
       $customerdata = DB::select("SELECT customerid,firstname,lastname FROM `tbl_customer`");
        

       if(!empty($customerdata)){
            $response = $customerdata;
        }

        return $response;
           

    }


    public function leadsourcDelete($leadsourceid){

        return $deleteResult = LeadSourceModel::where('leadsourceid',$leadsourceid)->delete(); 
    }

    public function checExistingleadsource($payload){

       
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


    public function leadsourceEdit($payload){

       $leadsourceid = $payload['leadsourceid'];

       if(isset($payload['leadsourceid'])){
         unset($payload['leadsourceid']);
       }
       
       
    
       $res = LeadSourceModel::where('leadsourceid',$leadsourceid)->update($payload);
       
      
      
       return $res; 

    }


    public function customerAdd($payload){
        // echo "<pre>";
        // print_r($payload);die;
        $Modelresponse = [];
        $existing_customerdata = [];
        $sqlQueryResult =  CustomerModel::select('customerid','email','mobile')->where('email', $payload['email'])->orWhere('mobile', $payload['mobile'])->first();
        
        if(!empty($sqlQueryResult)){
            $existing_customerdata = json_decode(json_encode($sqlQueryResult), true);

            if(($payload['email'] === $existing_customerdata['email']) || ($payload['mobile'] === $existing_customerdata['mobile']) ){
                $Modelresponse['status'] = 'fail';
                $Modelresponse['returnmsg'] = 'Customer already exists';
            } 
            
        } else
        {
            
            $customerModel = new CustomerModel();
            $res= $customerModel->insertGetId($payload);
           
            if(!$res){

                $Modelresponse['status'] = 'fail';
                $Modelresponse['returnmsg'] = 'Something Went Wrong';
            }
            else{
                
                $Modelresponse['status'] = 'success';
                $Modelresponse['returnmsg'] = 'Customer  Added Succesfully';
                $Modelresponse['last_customer_inserid'] = $res;
            }
             

        } 
       
        return $Modelresponse;
        

    }

 


}
