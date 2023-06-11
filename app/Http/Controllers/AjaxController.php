<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Helper; 
use Illuminate\Http\Request;
use View;
use Redirect;
use Auth;
use App\Models\DistrictModel;
use App\Models\CustomerModel;
use App\Models\LeadModel;
use Response;
use Session;


class AjaxController extends Controller
{
  

function getDashboarddataAll(Request $request){
        $res = [
            'total_leads' => 0,
            'total_customers' => 0,
            'todays_followup_leads' => 0,
            'total_projects' => 10
        ];
        $payload = $request->all();
         
       
        $totalLeads = LeadModel::getleadsAll();
        
        if(!empty($totalLeads)){
            $res['total_leads'] = count($totalLeads);
        }


        $totalCustomers = CustomerModel::customersGetAll([]);
        
        if(!empty($totalCustomers)){
            $res['total_customers'] = count($totalCustomers);
        }
        
        $ldate = date('Y-m-d');
        $todays_followup_leads = LeadModel::leadsearchAll(['next_followup_date' => $ldate ]);
        
         if(!empty($todays_followup_leads)){
            $res['todays_followup_leads'] = count($todays_followup_leads);
        }
 
        
        return json_encode($res);

    }

    function getdistrictbystateid(Request $request){
        $res = [];
        $payload = $request->all();
        
        
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }

        $res = DistrictModel::getdistrictbystateid(['state_id' => $payload['state_id']]);

        
        return json_encode($res);

    }

    function getcustomers(Request $request){
        $res = [];
        $payload = $request->all();
        
        
        if(isset($payload['_token'])){
            unset($payload['_token']);
        }

        $res = CustomerModel::customersGetAll($payload);

        
        return json_encode($res);
    }
 


   

   
 

    


    


    
    

}
 