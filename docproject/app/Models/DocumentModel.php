<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
use Hash;


class DocumentModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'document_master';
    protected $primaryKey = 'documentid';
 
  

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

    public function getuserbyid($payload){
        $res = [];
        $user = new DocumentModel();  
       
        $query = DB::table('document_master');

        if(isset($payload['email']) && !empty($payload['email']))
            $query->where('email', $payload['email']);

        if(isset($payload['mobile']) && !empty($payload['mobile']))
        $query->where('mobile', $payload['mobile']);

        if(isset($payload['documentid']) && !empty($payload['documentid']))
        $query->where('documentid', $payload['documentid']);


        $userdata = $query->get();
        
        
        

        if(!empty($userdata)){
            $res = $userdata;
        }
        
        return $res;
    }

    public function getuserAll(){
        $response = [];

        $userdata = User::select('documentid','firstname','lastname','email','mobile','userrole','created_at','createdby','isactive',)->get();
         
        
        if(!empty($userdata)){
            $response = $userdata;
        }

        return $response;
           

    }


    public function userDelete($documentid){

         return $deleteResult = User::where('documentid',$documentid)->delete(); 
        
    }

    public function checExistinguser($payload){

       
        $res = [];
        $user = new DocumentModel();  
       
        $query = DB::table('document_master');

        

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


    public function userEdit($payload){

       $userid = $payload['documentid'];

       if(isset($payload['documentid'])){
         unset($payload['documentid']);
       }

       if(isset($payload['mobile']) && !empty($payload['mobile'])){
            $payload['password'] = bcrypt($payload['mobile']);
       }
      
       $res = User::where('documentid',$userid)->update($payload);
       return $res; 

    }


    public function documentAdd($payload){
       
        $Modelresponse = [];
        $existing_userdata = [];

         $document = new DocumentModel();
         $res= $document->insert($payload);
           
            if(!$res){

                $Modelresponse['status'] = 'fail';
                $Modelresponse['returnmsg'] = 'Something Went Wrong';
            }
            else{
                
                $Modelresponse['status'] = 'success';
                $Modelresponse['returnmsg'] = 'Document Created Succesfully.';
            }
       
        return $Modelresponse;
        

    }



    public function changePassword($payload){
 
 
        if(isset($payload['password']) && !empty($payload['password'])){
             $payload['password'] = bcrypt($payload['password']);
        }
       
        $res = User::where('documentid',$payload['documentid'])->update($payload);
        return $res; 
 
     }


    //  public function getuserpassword($documentid){

    //     $response = [];
    //     $user = new DocumentModel();   
       
    //       $userdata =  User::select('*')->where('documentid', $documentid)->first();
       
    //      $data = json_decode(json_encode($userdata), true); 

      

    //     if(!empty($userdata)){
    //         $response = $userdata;
    //     } 
    //     return $response;
    // }


  


}
