<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Helper; 
use Illuminate\Http\Request;
use View;
use Redirect;
use Auth;
use App\Models\LeadModel;
use App\Models\LeadLogModel;
use App\Models\CustomerModel;
use Response;
use Session;
use Carbon\Carbon;

class CustomerController extends Controller
{
    //
    public function index(){

        // echo "<pre>";
        // print_r( Session::get('userdata'));die;
        // Session::get('userdata');
        $states = Helper::getStateAll();
        $leadSourceData = Helper::getLeadSourceAll(); 
        $customerBudget = Helper::getCustomerBudget();
        $customerModel = new CustomerModel();   
        $customerData = $customerModel->customersGetAll([]);
        return View::make('customers.view')->with(['customerData' => $customerData]);

    }


   

    

    public function getcustomerlistAll(Request $request){
      
        $result = [];
       
        $customerModel = new CustomerModel();   
        $customerdata = $customerModel->customersGetAll([]);

        if(!empty($customerdata)){
            
           $result = json_decode(json_encode($customerdata), true);

        }

    //    echo "<pre>";
    //    print_r($result);die;
      
       $returnHtml = view('customers.list')->with(['result' => $result ])->render();

        return response()->json(array('html'=>$returnHtml));


    }
    
     

    public function customerAdd (Request $request){
        $response = [];
        $customerModel = new CustomerModel(); 
       
        $payload = $request->all();
         
         
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }

        if(isset($payload['firstname']) && $payload['firstname'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Firstname is required';
        }

        if(isset($payload['lastname']) && $payload['lastname'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Lastname is required';
        }
        
        if(isset($payload['email']) && $payload['email'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Email is required';
        }

        if(isset($payload['mobile']) && $payload['mobile'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Mobile Number is required';
        }
 
        
        if(isset(Session::get('userdata')['email'])){
            $payload['createdby'] = Session::get('userdata')['email'];
            $payload['created_at'] = date("Y-m-d H:i:s", strtotime('now'));
        }

       

        $response = $customerModel->customerAdd($payload);

         
        return response()->json($response); 

    }


    



    



 


  


     
 

 

}
 