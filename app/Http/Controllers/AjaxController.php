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
use Response;
use Session;


class AjaxController extends Controller
{
  

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
 