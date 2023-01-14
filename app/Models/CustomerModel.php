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

    public function getcustomerbyid($payload){
        $res = [];
        $customerdata = [];
        $customer = new CustomerModel();  
       
        $query = DB::table('tbl_customer');

        if(isset($payload['email']) && !empty($payload['email']))
            $query->where('email', $payload['email']);

        if(isset($payload['mobile']) && !empty($payload['mobile']))
        $query->where('mobile', $payload['mobile']);

        if(isset($payload['customerid']) && !empty($payload['customerid']))
        $query->where('customerid', $payload['customerid']);


        $customerdata = $query->get();
        
        
        

        if(!empty($customerdata)){
            $res = $customerdata;
        }
        
        return $res;
    }

    public function getcustomersAll(){
        $response = [];

        $userdata = CustomerModel::select('customerid','firstname','lastname','email','mobile','alt_mobile','state','address','city','pincode','created_at','createdby')->where('isdeleted','0')->get();
         
        
        if(!empty($userdata)){
            $response = $userdata;
        }

        return $response;
           

    }


    public function customerDelete($customerid){

        $payload['customerid'] = $customerid;
        $payload['isdeleted'] = 1;
       
         return $deleteResult = CustomerModel::where('customerid',$customerid)->update($payload);
        
    }

    public function checExistingcustomer($payload){

       
        $res = [];
        $user = new CustomerModel();  
       
        $query = DB::table('tbl_customer');

        

        if(isset($payload['email']) && !empty($payload['email'])){
            
            $query->where('email', $payload['email']);
        }
          
        
        if(isset($payload['mobile']) && !empty($payload['mobile'])){  
            
            $query->orwhere('mobile', $payload['mobile']); 
        }
       

         
       
      
        $customerdata = $query->get();
        
         
        if(!empty($customerdata)){
            $res = json_decode(json_encode($customerdata), true); 
        }

        
        return $res;

    }


    public function customerEdit($payload){

       $customerid = $payload['customerid'];

       if(isset($payload['customerid'])){
         unset($payload['customerid']);
       }
 
      
       $res = CustomerModel::where('customerid',$customerid)->update($payload);
       return $res; 

    }


    public function customerAdd($payload){
        // echo "<pre>";
        // print_r($payload);die;
        $Modelresponse = [];
        $existing_userdata = [];
        $sqlQueryResult =  CustomerModel::select('email','mobile')->where('email', $payload['email'])->orWhere('mobile', $payload['mobile'])->first();
        
        if(!empty($sqlQueryResult)){
            $existing_userdata = json_decode(json_encode($sqlQueryResult), true);

            if($payload['email'] === $existing_userdata['email'] ){
                $Modelresponse['status'] = 'fail';
                $Modelresponse['returnmsg'] = 'Customer with this email already exists';
            }

            if($payload['mobile'] === $existing_userdata['mobile'] ){
                $Modelresponse['status'] = 'fail';
                $Modelresponse['returnmsg'] = 'User with this Mobile already exists';
            } 
        } else
        {
            
        //       echo "<pre>";
        // echo "payload from Model";
        // print_r($payload);
        // die;


            $user = new CustomerModel();
            $res= $user->insert($payload);
           
            if(!$res){

                $Modelresponse['status'] = 'fail';
                $Modelresponse['returnmsg'] = 'Something Went Wrong';
            }
            else{
                
                $Modelresponse['status'] = 'success';
                $Modelresponse['returnmsg'] = 'Customer Added Succesfully';
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


    //  public function getuserpassword($user_id){

    //     $response = [];
    //     $user = new UserModel();   
       
    //       $userdata =  User::select('*')->where('user_id', $user_id)->first();
       
    //      $data = json_decode(json_encode($userdata), true); 

      

    //     if(!empty($userdata)){
    //         $response = $userdata;
    //     } 
    //     return $response;
    // }


  


}
