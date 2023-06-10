<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use App\Models\StateModel;
use App\Models\DistrictModel;
use App\Models\LeadSourceModel;
use App\Models\LeadStatusModel;
use App\Models\CustomerModel;

use Arr;
class Helper
{
    public static function getStateAll($type = '')
    {
        $statesAll = [];

        $states = new StateModel();
      
        
        if($type == 'dropdown'){

              $statesAll = $states->getStatesAll();
              $statesAll = Arr::pluck($statesAll,'state_id','state_name');
        }
        else{
            
            $statesAll = $states->getStatesAll();
             
        } 

        return $statesAll; 
    }

     public static function getCustomersAll($statid = '', $type = '')
    {
        $customersAll = [];

        $customers = new CustomerModel();
       
        $customersAll = $customers->customersGetAll($statid);
          
        return $customersAll; 
    }


     public static function getDestrictsAll($statid = '', $type = '')
    {
        $districtsAll = [];

        $states = new DistrictModel();
       
        $districtsAll = $states->getDistrictsAll($statid);
             
         

        return $districtsAll; 
    }

    


    public static function getCustomerBudget(){
        return array(
            [
                "key" => "₹5 Lac",
                "value" => "500000",
            ],
            [
                "key" => "₹10 Lac",
                "value" => "1000000",
            ],
            [
                "key" => "₹20 Lac",
                "value" => "2000000",
            ],
            [
                "key" => "₹30 Lac",
                "value" => "3000000",
            ],
            [
                "key" => "₹40 Lac",
                "value" => "4000000",
            ],
            [
                "key" => "₹50 Lac",
                "value" => "5000000",
            ],
            [
                "key" => "₹60 Lac",
                "value" => "6000000",
            ],
            [
                "key" => "₹70 Lac",
                "value" => "7000000",
            ],
            [
                "key" => "₹80 Lac",
                "value" => "8000000",
            ],
            [
                "key" => "₹90 Lac",
                "value" => "9000000",
            ],
            [
                "key" => "₹1 Cr",
                "value" => "10000000",
            ],
            [
                "key" => "₹1.2 Cr",
                "value" => "12000000",
            ],
            [
                "key" => "₹1.4 Cr",
                "value" => "14000000",
            ],
            [
                "key" => "₹1.6 Cr",
                "value" => "16000000",
            ],
            [
                "key" => "₹1.8 Cr",
                "value" => "18000000",
            ],
            [
                "key" => "₹2 Cr",
                "value" => "20000000",
            ],
            [
                "key" => "₹2.3 Cr",
                "value" => "23000000",
            ],
            [
                "key" => "₹2.6 Cr",
                "value" => "26000000",
            ],
            [
                "key" => "₹3 Cr",
                "value" => "30000000",
            ]
            
           
        );
    }

    public static function getleadStatusAll($type = '')
    {
        $leadstatuseAll = [];

        $leadstatus = new LeadStatusModel();
      
        
        if($type == 'dropdown'){

              $leadstatuseAll = $leadstatus->leadstatusAll();
              $leadstatuseAll = Arr::pluck($leadstatuseAll,'leadstatusid','leadstatus');
        }
        else{
            
            $leadstatuseAll = $leadstatus->leadstatusAll();
             
        } 

        return $leadstatuseAll; 
    }


    public static function getLeadSourceAll($type = '')
    {
        $leadsourceAll = [];

        $leadsource = new LeadSourceModel();
      
        
        if($type == 'dropdown'){

              $leadsourceAll = $leadsource->leadsourceAll();
              $leadsourceAll = Arr::pluck($leadsourceAll,'leadsourceid','leadsource');
        }
        else{
            
            $leadsourceAll = $leadsource->leadsourceAll();
             
        } 

        return $leadsourceAll; 
    }



    
 
}

?>