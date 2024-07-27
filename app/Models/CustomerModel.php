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

    

    public static function customersGetAll($payload){
       
       $response = []; 
        
       
       $customerdata = DB::select("SELECT customerid,firstname,lastname,email,mobile,alt_mobile FROM `tbl_customer`");
        

       if(!empty($customerdata)){
            $response = $customerdata;
        }

        return $response;
           

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
