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

class LeadController extends Controller
{
    //
    public function index(){

        // echo "<pre>";
        // print_r( Session::get('userdata'));die;
        // Session::get('userdata');
        $states = Helper::getStateAll();
        $leadSourceData = Helper::getLeadSourceAll(); 
        $customerBudget = Helper::getCustomerBudget();
        $customerData = Helper::getCustomersAll();
       
        return View::make('leads.view')->with(['customerData' => $customerData ,'customerBudget' => $customerBudget ,'states'=> $states , 'leadSourceData'=> $leadSourceData ]);

    }


   

    public function getleadsAll(Request $request){
      
        $result = [];
        
        $lead = new LeadModel();   
        $leaddata = $lead->getleadsAll();

        if(!empty($leaddata)){
            
           $result = json_decode(json_encode($leaddata), true);

        }

        $states = Helper::getStateAll();
      
       $returnHtml = view('leads.list')->with(['result' => $result , 'states' => $states])->render();

        return response()->json(array('html'=>$returnHtml));


    }

    public function leadById(Request $request){
      
        $response = [];
        $lead = new LeadModel(); 
       
        $payload = $request->all();
        $leadid = $payload['leadid'];
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }
       
        
        $leaddata =  $lead->getleadbyid( ['leadid' => $leadid] );

        if(!empty($leaddata)){
                       
           $response = json_decode(json_encode($leaddata), true);

        }

      

        

     
       return response()->json($response); 


    }

    public function leadAdd (Request $request){
        $response = [];
        $leadModel = new LeadModel(); 
       
        $payload = $request->all();
        $units_interested_in = [];
        if(!empty($payload['units_interested_in'])){
            $unitlen = count($payload['units_interested_in']);
            for($i=0; $i<$unitlen; $i++ ){
                $unit = explode('-',$payload['units_interested_in'][$i]);
                $obj = (Object) array($unit[0] => $unit[1]);
                $units_interested_in[$i] = $obj; 
            }
        }
        $units_interested_in = json_encode($units_interested_in);
        $payload['units_interested_in'] = $units_interested_in; 
         
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

         if(isset($payload['state']) && $payload['state'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'state is required';
        }

         if(isset($payload['district']) && $payload['district'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'District required';
        }


         if(isset($payload['city']) && $payload['city'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'City is required';
        }
        
        if(isset(Session::get('userdata')['email'])){
            $payload['createdby'] = Session::get('userdata')['email'];
            $payload['created_at'] = date("Y-m-d H:i:s", strtotime('now'));
        }

        $payload['leadstatus'] = '1';

        $response = $leadModel->leadAdd($payload);

         
        return response()->json($response); 

    }


    public function leadEditSave (Request $request){
        $response = [];
        $leadModel = new LeadModel(); 
       
        $payload = $request->all();
        

        $units_interested_in = [];
        if(!empty($payload['units_interested_in'])){
            $unitlen = count($payload['units_interested_in']);
            for($i=0; $i<$unitlen; $i++ ){
                $unit = explode('-',$payload['units_interested_in'][$i]);
                $obj = (Object) array($unit[0] => $unit[1]);
                $units_interested_in[$i] = $obj; 
            }
        }
        $units_interested_in = json_encode($units_interested_in);
        $payload['units_interested_in'] = $units_interested_in; 
         
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }

        
         if(isset($payload['state']) && $payload['state'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'state is required';
        }

         if(isset($payload['district']) && $payload['district'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'District required';
        }


         if(isset($payload['city']) && $payload['city'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'City is required';
        }
        
        if(isset(Session::get('userdata')['email'])){
            $payload['createdby'] = Session::get('userdata')['email'];
            $payload['created_at'] = date("Y-m-d H:i:s", strtotime('now'));
        }

        // echo "<pre>";
        // echo "payload";
        // print_r($payload); die;

        $response = $leadModel->leadEditSave($payload);

        
        return response()->json($response); 

    }



    public function leadremarkAdd (Request $request){
        $response = [];
        $leadlog = new LeadLogModel(); 
       
        $payload = $request->all();
        $payload['createdby'] = SESSION::get('userdata')['email'];
        
         
        
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }

        
        


        if(isset($payload['logtext']) && $payload['logtext'] == '' ){
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Lead Remark is required';
        }
        

          
        
        if(isset(Session::get('userdata')['email'])){
            $payload['createdby'] = Session::get('userdata')['email'];
            $payload['userid'] = Session::get('userdata')['user_id'];
            $payload['createddate'] = date("Y-m-d H:i:s", strtotime('now'));
        }

        

        $response = $leadlog->leadRemarkAdd($payload);

        
        return response()->json($response); 

    }



public function detail(Request $request){
    $id = $request->id;
    $parameter = $request->parameter;
  }


  public function getleadloglist(Request $request){

    $res = [];
    $lead = new LeadLogModel();     
    $leadid = $request->leadid;

    $leadlogdata = $lead->getleadloglist( ['leadid' => $leadid] );

    if(!empty($leadlogdata)){
        $res['status'] = 'success';
        $res['data'] = $leadlogdata;        
    }
    else{
         $res['status'] = 'fail';
        $res['data'] = [];      
    }

     return response()->json($res); 


  }
    public function leadEdit (Request $request){
        
        $lead = new LeadModel(); 

        $leadid = $request->leadid;  
        $leaddata =  $lead->getleadbyid( ['leadid' => $leadid] );
         

        if(!empty($leaddata->units_interested_in)){
            $leaddata->next_followup_date = date("Y-m-d", strtotime($leaddata->next_followup_date));
        }

        // echo $leaddata->next_followup_date;  die;

        if(!empty($leaddata->units_interested_in)){
            $tempunits = [];
            $leaddata->units_interested_in = json_decode($leaddata->units_interested_in);
            
            foreach($leaddata->units_interested_in  as $unit){
                $unit = (array)$unit;
                $key = key($unit);
                $val = $unit[$key];
                if(!empty($key) && !empty($val)){
                    $tempunits[] = $key .'-'.$val;
                }
 
            } 
        }
        
        if(!empty($tempunits)){

            $leaddata->units_interested_in = $tempunits;
        }
       

        

        $states = Helper::getStateAll();
        $districts = Helper::getDestrictsAll($leaddata->state);
        $leadSourceData = Helper::getLeadSourceAll(); 
        $customerBudget = Helper::getCustomerBudget();
        $leadStatusAll = Helper::getleadStatusAll();
        
        
    
        return View::make('leads.edit')->with(['leadStatusAll'=> $leadStatusAll,'customerBudget'=> $customerBudget,'districts'=> $districts, 'leaddata'=> $leaddata , 'states'=> $states , 'leadSourceData'=> $leadSourceData ]);
 
    }


    public function leadDelete (Request $request){
        $response = [];
        $payload = $request->all();
        $lead = new LeadModel(); 
        
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }
 
 
        $res = $lead->leadDelete($payload['leadid']);

        if($res == 1){

            $response['status'] = 'success';
            $response['returnmsg'] = 'Lead Deleted!';
        }
        else{
            $response['status'] = 'fail';
            $response['returnmsg'] = 'Error in deleting Lead Something went wrong!';
        }

         
        return response()->json($response); 

    }

    public function leadsearch(){ 

         
        
        $states = Helper::getStateAll();
        
        $leadSourceData = Helper::getLeadSourceAll(); 
        $customerBudget = Helper::getCustomerBudget();
        $leadStatusAll = Helper::getleadStatusAll();
        
        

        return View::make('leads.search')->with(['leadStatusAll'=> $leadStatusAll,'customerBudget'=> $customerBudget, 'states'=> $states , 'leadSourceData'=> $leadSourceData ]);
      
        // return View::make('leads.search')->with(['states'=> $states , 'leadSourceData'=> $leadSourceData ]);

    }


    public function leadsearchAll(Request $request){
      
        $result = [];
        $payload = $request->all();

         if(isset($payload['_token'])){
            unset($payload['_token']);
        }


        $lead = new LeadModel();   
        $leaddata = $lead->leadsearchAll($payload);

        if(!empty($leaddata)){
            
           $result = json_decode(json_encode($leaddata), true);

        }
        

        $states = Helper::getStateAll();
      
       $returnHtml = view('leads.searchlist')->with(['result' => $result , 'states' => $states])->render();

        return response()->json(array('html'=>$returnHtml));


    }

}
 