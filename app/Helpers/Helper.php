<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use App\Models\StateModel;
use App\Models\DistrictModel;

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



    
 
}

?>