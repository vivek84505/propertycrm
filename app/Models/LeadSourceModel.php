<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
use Hash;


class LeadSourceModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tbl_leadsourcemaster';
    protected $primaryKey = 'leadsourceid';
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

    public function leadsourceAll(){
        $response = [];

        $leadsourcedata = LeadSourceModel::select('leadsourceid','leadsource','isactive','createdby','createddate','lastmodifiedby','lastmodifieddate')->get();
         
       
        if(!empty($leadsourcedata)){
            $response = $leadsourcedata;
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


    public function leadsourceAdd($payload){
        // echo "<pre>";
        // print_r($payload);die;
        $Modelresponse = [];
        $existing_leadsourcedata = [];
        $sqlQueryResult =  LeadSourceModel::select('leadsource')->where('leadsource', $payload['leadsource'])->first();
        
        if(!empty($sqlQueryResult)){
            $existing_leadsourcedata = json_decode(json_encode($sqlQueryResult), true);

            if($payload['leadsource'] === $existing_leadsourcedata['leadsource'] ){
                $Modelresponse['status'] = 'fail';
                $Modelresponse['returnmsg'] = 'This Lead Source already exists';
            } 
            
        } else
        {
            
            $leadsource = new LeadSourceModel();
            $res= $leadsource->insert($payload);
           
            if(!$res){

                $Modelresponse['status'] = 'fail';
                $Modelresponse['returnmsg'] = 'Something Went Wrong';
            }
            else{
                
                $Modelresponse['status'] = 'success';
                $Modelresponse['returnmsg'] = 'Lead Source Added Succesfully';
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

 
  


}
