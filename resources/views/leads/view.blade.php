<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Colors">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <style>
    .custom-select-width {
            width: 100% !important;
    }
    </style>
    <!-- Title -->
    <title> Property CRM </title>

    <!-- Favicon -->
  @include('include.header_assets');
  <?php 
    //  print_r($userdata);die;
    $userdata = [];
  ?>

</head>

<body>

    <div class="page-wrapper">

      @include('include/header');

        <!-- ###### Layout Container Area ###### -->
        
            <!-- Side Menu Area -->
           @include('include/sidebar');
           
            <!-- Layout Container -->
            <div class="layout-container sidemenu-container">
               
                 <!-- Breadcrumb Area -->
                 <div class="breadcrumb-area">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Property Leads Management</a></li>
                              
                             </ol>
                             <button data-toggle="collapse" data-target="#demo"class="btn btn-info btn-sm btn-lg float-right" >Add Lead </button></br>
                        </nav>
                    </div>
                </div>

            

                 <!-- Wrapper -->
                 <div class="wrapper wrapper-content">
                    <div class="container-fluid">
                    <div id="demo" class="collapse" >
                    <div class="row">

                  
                       
                            <div  class="col-lg-12">
                           
                                <div  class="ibox bg-boxshadow mb-50">
                                    <!-- Title -->
                                    <div class="ibox-title basic-form mb-30">
                                        <h5> Add New Lead  </h5>
                                    </div>
                                    <!-- Ibox-content -->
                                    <div class="ibox-content">
                                     
                                    <form id="addcustomer_form" >
                                        <div class="row">
                                            
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                             <div class="col-md-6">
                                                <label class="col-form-label">Select Customer</label>                                                
                                                <select name="customerid" id="customerid" class="form-control select2" style="width: 100%" >
                                                     <option value=""> Select Customer </option>
                                                              
                                                </select>
                                            </div>
                                           
                                            <div class="col-md-3" style="margin-top: 15px;">
                                                
                                               <button class="btn m-2 btn-info" type="button" data-toggle="modal" data-target="#addCustomerModal"> Add New Customer</button>
                                              
                                            </div>
                                            
                                            <div class="col-md-3"></div>


                                           
                                            
                                            <div class="col-md-3">
                                                <label class="col-form-label">State</label>                                                
                                                <select name="state" id="state" class="form-control"  >
                                                     <option value=""> Select State </option>
                                                    @foreach($states as $state )
                                                    <option value="{{ $state['state_id'] }}"> {{ $state['state_name'] }} </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                             <div class="col-md-3">
                                                <label class="col-form-label">District</label>                                                
                                                <select name="district" id="district" class="form-control"  >
                                                    
                                                </select>
                                            </div>

                        
                                            


                                            <div class="col-md-3">
                                                 <label class="col-form-label">City</label>
                                                <input type="text" name="city" id="city" class="form-control" >
                                            </div>

                                             <div class="col-md-3">
                                                <label class="col-form-label">Lead Source </label>                                                
                                                <select name="leadsource" id="leadsource" class="form-control"  >
                                                    <option value=""> Select Source </option>
                                                    @foreach($leadSourceData as $leadsource )
                                                    <option value="{{ $leadsource['leadsourceid'] }}"> {{ $leadsource['leadsource'] }} </option>
                                                    @endforeach
                                                   
                                                </select>
                                            </div>



                                             <div class="col-md-3">
                                                <label class="col-form-label">Property Type </label>                                                
                                                <select name="property_type" id="property_type" class="form-control"  >
                                                     <option value=""> Select Type </option>                                                     
                                                    <option value="resedential"> Resedential </option>
                                                    <option value="commercial"> Commercial </option>
                                                    <option value="plot"> Plot </option>
                                                   
                                                </select>
                                            </div>

                                             <div class="col-md-3 propunits" style="display:none" >
                                                    <label class="col-form-label">Units Interested In </label> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;                                        
                                                <select   name="units_interested_in[]" id="units_interested_in" class="form-control"  multiple="multiple"  >
                                                                                                     
                                                    <option value="1-1BHK"> 1BHK </option>
                                                    <option value="2-1.5BHK"> 1.5BHK </option>
                                                    <option value="3-2BHK"> 2BHK </option>
                                                    <option value="4-2.5BHK"> 2.5BHK </option>
                                                    <option value="5-3BHK"> 3BHK </option>   
                                                </select>  
                                            </div>
                                             


                                             <div class="col-md-3" >
                                                <label class="col-form-label">Min Budget </label>                                                
                                                <select   name="customer_budget_min" id="customer_budget_min" class="form-control"    >
                                                     <option value=""> Select price </option>                                                     
                                                        
                                                        @foreach($customerBudget as $budget)
                                                                    <option value="{{ $budget['value'] }}"> {{ $budget['key'] }} </option> 
                                                        @endforeach                                    
                                                   
                                                </select>
                                            </div>


                                           

                                             <div class="col-md-3" >
                                                <label class="col-form-label">Max Budget </label>                                                
                                                <select   name="customer_budget_max" id="customer_budget_max" class="form-control"    >
                                                     <option value=""> Select price </option>  
                                                        @foreach($customerBudget as $budget)
                                                                    <option value="{{ $budget['value'] }}"> {{ $budget['key'] }} </option> 
                                                        @endforeach                                      
                                                   
                                                </select>
                                            </div>

                                              <div class="col-md-3">
                                                <label class="col-form-label">Loan Required </label>                                                
                                                <select name="loan_required" id="loan_required" class="form-control"  >
                                                     <option value=""> Select </option>
                                                    <option value="1"> YES </option>
                                                    <option value="0"> NO </option>
                                                     
                                                </select>
                                            </div>
                                           
                                             <div class="col-md-6">
                                                <label class="col-form-label">Lead Description </label>
                                                <textarea class="form-control"  name="lead_description" id="lead_description" cols="40" rows="10"></textarea>
                                                
                                            </div>
 
                                        </div>
                                       
                                        <div class="col-md-12 text-right  submitbutton " >
                                            <button class="btn btn-danger btn-sm" type="reset"  >Clear</button>
                                            <button class="btn btn-info btn-sm" type="submit">Save Lead</button>
                                         </div>
                                    </form>


                                    <!-- Add Customer Modal -->

                                    <!-- Modal -->
                                    <div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Add New Customer</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <form id="addcustomer_entry_form" >
                                                    <div class="row">
                                                         <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                                        <div class="col-md-4">
                                                            <label class="col-form-label">Firstname</label>
                                                            <input type="text" name="firstname" id="firstname" class="form-control" >
                                                        </div>


                                                        <div class="col-md-4">
                                                            <label class="col-form-label">Lastname</label>
                                                            <input type="text" name="lastname" id="lastname" class="form-control"  >
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="col-form-label">Email</label>
                                                            <input type="email" name="email" id="email" class="form-control" >
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="col-form-label">Mobile</label>
                                                            <input type="text" name="mobile" id="mobile" class="form-control" >
                                                        </div>


                                                        <div class="col-md-4">
                                                            <label class="col-form-label">Alternate Mobile</label>
                                                            <input type="text" name="alt_mobile" id="alt_mobile" class="form-control"  >
                                                        </div>

                                                         
                                                    </div>
                                                    
                                                     
                                                </div>
                                                <!-- Modal Footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-info">Save changes</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>



                        <!-- Users Table -->

                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Ibox -->
                                <div class="ibox bg-boxshadow mb-50">
                                    <!-- Ibox Title -->
                                    <div class="ibox-title">
                                        <h5 class="mb-30">Lead List </h5>
                                    </div>
                                    <div class="ibox-content">
                                        
                                      <div id="userlist">

                                      </div>      
                                      
                                    </div>
                                </div>
                            </div>
                        </div>

                       


                    </div>
            </div>
                 

    


                     @include('include/footer');
                     
         

        
    </div>

   

    <!-- jQuery 2.2.4 -->
    @include('include.footer_assets');

</body>
<!-- ajax: "{{route('usersgetall')}}", -->
<script>

    
$(document).ready(function(){
    
    getleadlist();
    getcustomersAll();
   
});

function getleadlist(){
   
     var token = $('#token').val();
      
      $.ajax({
          type:"POST",
          url: "{{ route('leadsgetall') }}",
          data: { "_token": token },
          dataType: 'json',
          beforeSend:function(){
                $("#loader").show();
          },
          success: function(res){
             
           
            if(res.html){

                $("#userlist").html(res.html);
 
            }


         },
         complete:function(){
                  $("#loader").hide();
         }
      }); 
}

 

</script>


<script>
    $(document).ready(function() {

        $.validator.addMethod("greaterThan",
    function (value, element, param) {
          var $otherElement = $(param);
          return parseInt(value, 10) >= parseInt($otherElement.val(), 10);
    });
 
    $("#addcustomer_form").validate({
        rules: {
            
            state: {
                required: true
            },
            district: {
                required: true
            },
            city: {
                required: true
            },
            leadsource:{
                required:true
            },
            property_type:{
                required:true
            },
            units_interested_in:{
                required:true
            },
            customer_budget_max:{
                required:true,
                greaterThan: "#customer_budget_min"
            },
            customer_budget_min:{
                required:true
            }

            
            
        },
        messages: {
            
            state: {
                required:  "state is required"
            } ,
            district: {
                required:  "district is required"
            }  ,
            city: {
                required:  "city is required"
            },
            leadsource: {
                required:  "leadsource is required"
            },             
            property_type: {
                required:  "property_type is required"
            },
            units_interested_in: {
                required:  "units_interested_in is required"
            },
             customer_budget_max: {
                required:  "customer max budget is required",
                greaterThan:"Max budget should be greater than Min"
            },
             customer_budget_min: {
                required:  "customer min budget is required"
            }
             
        },        
        submitHandler: function(form,e) {
            e.preventDefault();
            console.log('Form submitted');
            $.ajax({
                type: 'POST',
                url: "{{route('leadadd')}}",
                dataType: "html",
                data: $('#addcustomer_form').serialize(),
                beforeSend: function() {

                    $("#loader").show();
                },               
                success: function(result) {

                    result = JSON.parse(result);
                   
                    if(result.status === 'success'){

                        alertify.success(result.returnmsg);    
                                

                    }
                    else if (result.status === 'fail'){
                        alertify.error(result.returnmsg);
                    } 

                    $('#addcustomer_form')[0].reset();

                    getleadlist();
                },
                complete: function() {
                    $("#loader").hide();
                },
                error : function(error) {

                }
            });
            return false;
        }
    });

});
</script>


<script>
 $(document).ready(function() {
     $("#addcustomer_entry_form").validate({
        rules: {
            firstname: {
                required: true
            },
            lastname: {
                required: true
            },
            email: {
                required: true,
                email:true
            },
            mobile: {
                required: true
            },
              
        },
        messages: {
            firstname: {
                required: "Firstname is required"
            },
            lastname: {
                required: "Lastname is required"
            },
            email: {
                required: "Email is required"
                
            },
            mobile: {
                required:  "Mobile is required"
            } 
        },        
        submitHandler: function(form,e) {
            e.preventDefault();
            console.log('Form submitted');
            $.ajax({
                type: 'POST',
                url: "{{route('customeradd')}}",
                dataType: "html",
                data: $('#addcustomer_entry_form').serialize(),
                beforeSend: function() {

                    $("#loader").show();
                },               
                success: function(result) {

                    result = JSON.parse(result);
                   
                    if(result.status === 'success'){
                       
                        $('#customerid').find('option').remove().end();
    
    
    
                        getcustomersAll();
                        console.log('customer last insertid ===>',result.last_customer_inserid);
                        setTimeout(() => {
                                 $("#customerid").val(result.last_customer_inserid).trigger('change');

                        }, 1000);

                        alertify.success(result.returnmsg);    
                                

                    }
                    else if (result.status === 'fail'){
                        alertify.error(result.returnmsg);
                    } 

                    $('#addcustomer_form')[0].reset();

                    getleadlist();
                },
                complete: function() {
                    $("#loader").hide();
                },
                error : function(error) {

                }
            });
            return false;
        }
    });
 });
</script>
<script>

$("#property_type").change(function(){

    // alert('dsadas');
    // units = [{'1' : '1bhk'},{'2' : '1.5bhk'},{'3' : '2bhk'},{'4' : '2.5bhk'}];
    // console.log(JSON.stringify(units));
     
     

    var property_type = $(this).val();
   
     

    if(property_type === 'resedential'){
      $(".propunits").show();      
    }
    else{
        $(".propunits").hide();
    }
   
   
     
});
     



    $("#state").change(function(){

        var token = $('#token').val();
        var state_id = $(this).val();
      $.ajax({
          type:"POST",
          url: "{{ route('getdistrictbystateid') }}",
          data: { "_token": token ,"state_id":state_id},
          dataType: 'json',
          beforeSend:function(){
              $("#loader").show();
          },
          success: function(res){
            html = '';
            html += '<option value="" >Select District </option>';

            if(res.length > 0){
                    // console.log("res====>",res);
             $.each(res,function(key,val){
               
                  html += '<option value="'+ val.district_id +'" >'+ val.district_name +'</option>';
               
             }) ;                      
            }

            $("#district").html(html);
           


         },
         complete:function(){
             $("#loader").hide();
         }
      }); 




    })
</script>



<script type="text/javascript">
    $(document).ready(function() {
        $('#units_interested_in').multiselect();
    });
</script>

<script>
$('#customerid').select2({
  selectOnClose: true
});
  
</script>

<script>
     $(document).ready(function(){
      var csrf_token =  "{{ csrf_token() }}"
      $( "#customerids" ).select2({
        ajax: { 
          url: "{{route('getcustomers')}}",
          type: "post",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
              _token: csrf_token,
              firstname: params.term // search term
            };
          },
          processResults: function (response) {
            return {
              results: response
            };
          },
          cache: true
        }

      });

    });
</script>

 

<script>
     

    async function getcustomersAll(){
   
     var token = $('#token').val();
      
      $.ajax({
          type:"POST",
          url: "{{ route('getcustomers') }}",
          data: { "_token": token },
          dataType: 'json',
          
          success: function(res){
             
           console.log('get customer res=========>',res);
            if(res.length > 0 ){
               var dropdown = document.getElementById("customerid");
               
               for( var i = 0; i<res.length; i++ ){
                  var option = document.createElement('option');
                  option.value = res[i].customerid;
                  option.text = res[i].firstname +" "+res[i].lastname;
                  dropdown.add(option);
               } 
                 
              
 
            }


         }
        
      }); 
}
</script>

 
</html>