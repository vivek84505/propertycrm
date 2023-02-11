


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Colors">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title> Property CRM </title>

    <!-- Favicon -->
  @include('include.header_assets');

</head>

<body>

    <div class="page-wrapper">

      @include('include/header');

        <!-- ###### Layout Container Area ###### -->
        <div class="layout-container-area mt-25">
            <!-- Side Menu Area -->
           @include('include/sidebar');
           
            <!-- Layout Container -->
            <div class="layout-container sidemenu-container">
                <div class="container-fluid">
                    <div class="row justify-content-center"> 
                        <div class="col-12">
                            <!-- Product List Area -->
                            <div class="product-list--area mb-80 bg-boxshadow">
                                <div class="ibox-content">
                                    <div class="row mb-40">
                                        <div  class="col-md-12">
                                            <h5 class="title-- mb-30">Edit Lead </h5>
                                        </div>
                                        
                                        <form id="lead_edit_form" >
                                            <div class="row">
                                              <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                                <input type="hidden" name="leadid" id="leadid" value="{{ $leaddata->leadid ?? '' }}" >
                                                <div class="col-sm-6">
                                                        <label class="col-form-label">Firstname</label>
                                                        <input type="text" name="firstname" id="firstname" class="form-control" value="{{ $leaddata->firstname ?? '' }}" >
                                                </div>
                                               
                                                <div class="col-sm-6">
                                                        <label class="col-form-label">Lastname</label>
                                                        <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $leaddata->lastname ?? '' }}" >
                                                </div>

                                                <div class="col-sm-6">
                                                        <label class="col-form-label">Email</label>
                                                        <input type="email" name="email" id="email" class="form-control" value="{{ $leaddata->email ?? '' }} " >
                                                </div>

                                                <div class="col-sm-6">
                                                         <label class="col-form-label">Mobile</label>
                                                         <input type="text" name="mobile" id="mobile" class="form-control" value="{{ $leaddata->mobile ?? '' }}" >
                                                </div>

                                                 <div class="col-sm-6">
                                                         <label class="col-form-label">Alternate Mobile</label>
                                                          <input type="text" name="alt_mobile" id="alt_mobile" class="form-control" value="{{ $leaddata->alt_mobile ?? '' }}" >
                                                </div>

                                                 <div class="col-sm-6">
                                                         <label class="col-form-label">State</label>                                                
                                                        <select name="state" id="state" class="form-control"  >
                                                            <option value=""> Select State </option>
                                                            @foreach($states as $state )
                                                            
                                                            @if($state['state_id'] == $leaddata->state)
                                                                <option value="{{ $state['state_id'] }}" selected> {{ $state['state_name'] }} </option>
                                                            @else
                                                            <option value="{{ $state['state_id'] }}"> {{ $state['state_name'] }} </option>        
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                </div>

                                                 <div class="col-sm-6">
                                             
                                                <label class="col-form-label">District</label>                                                
                                                <select name="district" id="district" class="form-control"  >
                                                     <option value=""> Select District </option>

                                                         @foreach($districts as $district )
                                                            
                                                            @if($district->district_id == $leaddata->district)
                                                                <option value="{{ $district->district_id }}" selected> {{ $district->district_name }} </option>
                                                            @else
                                                            <option value="{{ $district->district_id }}"> {{ $district->district_name }} </option>        
                                                            @endif
                                                        @endforeach

                                                </select>
                                                </div>


                                                


                                                <div class="col-sm-6">
                                                    
                                                        <label class="col-form-label">City</label>
                                                        <input type="text" name="city" id="city" class="form-control" value="{{ $leaddata->city ?? '' }}" >
                                                    
                                                </div>


                                                <div class="col-sm-6">
                                                    
                                                        <label class="col-form-label">Lead Source </label>                                                
                                                        
                                                        <select name="leadsource" id="leadsource" class="form-control"  >
                                                            <option value=""> Select Source </option>
                                                            @foreach($leadSourceData as $leadSource )
 
                                                              @if($leadSource['leadsourceid'] == $leaddata->leadsource)
                                                                <option value="{{ $leadSource['leadsourceid'] }}" selected> {{ $leadSource['leadsource'] }} </option>
                                                            @else
                                                            <option value="{{ $leadSource['leadsourceid'] }}"> {{ $leadSource['leadsource'] }} </option>        
                                                            @endif

                                                            @endforeach
                                                        </select>
                                                        
                                                       
                                                </div>


                                                 


                                                <div class="col-sm-6">
                                                    
                                                        <label class="col-form-label">Units Interested In </label> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;                                        
                                                        <select   name="units_interested_in[]" id="units_interested_in" class="form-control"  multiple="multiple"  >
                                                                                                            
                                                            <option value="1-1BHK" <?php if(in_array('1-1BHK',$leaddata->units_interested_in)) echo "selected" ?> > 1BHK </option>
                                                            <option value="2-1.5BHK" <?php if(in_array('2-1.5BHK',$leaddata->units_interested_in)) echo "selected" ?> > 1.5BHK </option>
                                                            <option value="3-2BHK" <?php if(in_array('3-2BHK',$leaddata->units_interested_in)) echo "selected" ?> > 2BHK </option>
                                                            <option value="4-2.5BHK" <?php if(in_array('4-2.5BHK',$leaddata->units_interested_in)) echo "selected" ?> > 2.5BHK </option>
                                                            <option value="5-3BHK" <?php if(in_array('5-3BHK',$leaddata->units_interested_in)) echo "selected" ?>> 3BHK </option>   
                                                        </select>  
                                                </div>

                                                <div class="col-sm-6">                                             
                                                    <label class="col-form-label">Min Budget </label>                                                
                                                        <select   name="customer_budget_min" id="customer_budget_min" class="form-control"    >
                                                            <option value=""> Select price </option>  
                                                                @foreach($customerBudget as $budget)
                                                                    @if($budget['value'] == $leaddata->customer_budget_min)
                                                                    <option value="{{ $budget['value'] }}" selected> {{ $budget['key'] }} </option>
                                                                    @else
                                                                     <option value="{{ $budget['value'] }}"> {{ $budget['key'] }} </option>
                                                                    @endif
                                                                @endforeach    
                                                                <!-- <option value="500000">₹5 Lac</option>
                                                                <option value="1000000">₹10 Lac</option>
                                                                <option value="2000000">₹20 Lac</option>
                                                                <option value="3000000">₹30 Lac</option>
                                                                <option value="4000000">₹40 Lac</option>
                                                                <option value="5000000">₹50 Lac</option>
                                                                <option value="6000000">₹60 Lac</option>
                                                                <option value="7000000">₹70 Lac</option>
                                                                <option value="8000000">₹80 Lac</option>
                                                                <option value="9000000">₹90 Lac</option>
                                                                <option value="10000000">₹1 Cr</option>
                                                                <option value="12000000">₹1.2 Cr</option>
                                                                <option value="14000000">₹1.4 Cr</option>
                                                                <option value="16000000">₹1.6 Cr</option>
                                                                <option value="18000000">₹1.8 Cr</option>
                                                                <option value="20000000">₹2 Cr</option>
                                                                <option value="23000000">₹2.3 Cr</option>
                                                                <option value="26000000">₹2.6 Cr</option>
                                                                <option value="30000000">₹3 Cr</option>                                     
                                                         -->
                                                        </select>
                                                </div>



                                                <div class="col-sm-6">                                             
                                                    <label class="col-form-label">Max Budget </label>                                                
                                                        <select   name="customer_budget_max" id="customer_budget_max" class="form-control"    >
                                                            <option value=""> Select price </option>   
                                                            
                                                            @foreach($customerBudget as $budget)
                                                                    @if($budget['value'] == $leaddata->customer_budget_max)
                                                                    <option value="{{ $budget['value'] }}" selected> {{ $budget['key'] }} </option>
                                                                    @else
                                                                     <option value="{{ $budget['value'] }}"> {{ $budget['key'] }} </option>
                                                                    @endif
                                                                @endforeach  


                                                                <!-- <option value="500000">₹5 Lac</option>
                                                                <option value="1000000">₹10 Lac</option>
                                                                <option value="2000000">₹20 Lac</option>
                                                                <option value="3000000">₹30 Lac</option>
                                                                <option value="4000000">₹40 Lac</option>
                                                                <option value="5000000">₹50 Lac</option>
                                                                <option value="6000000">₹60 Lac</option>
                                                                <option value="7000000">₹70 Lac</option>
                                                                <option value="8000000">₹80 Lac</option>
                                                                <option value="9000000">₹90 Lac</option>
                                                                <option value="10000000">₹1 Cr</option>
                                                                <option value="12000000">₹1.2 Cr</option>
                                                                <option value="14000000">₹1.4 Cr</option>
                                                                <option value="16000000">₹1.6 Cr</option>
                                                                <option value="18000000">₹1.8 Cr</option>
                                                                <option value="20000000">₹2 Cr</option>
                                                                <option value="23000000">₹2.3 Cr</option>
                                                                <option value="26000000">₹2.6 Cr</option>
                                                                <option value="30000000">₹3 Cr</option>                                      -->
                                                        
                                                        </select>
                                                </div>

                                                <div class="col-sm-4">                                             
                                                    <label class="col-form-label">Loan Required </label>                                                
                                                        <select name="loan_required" id="loan_required" class="form-control"  >
                                                            <option value=""> Select </option>
                                                            <option value="1" <?php if($leaddata->loan_required == "1") echo 'selected';  ?> > YES </option>
                                                            <option value="0" <?php if($leaddata->loan_required == "0") echo 'selected';  ?>> NO </option>
                                                            
                                                        </select>
                                                </div>

                                                 

                                                <div class="col-sm-4">                                             
                                                    <label class="col-form-label">Next Followup Date </label>                                                
                                                        <input value="{{$leaddata->next_followup_date}}" type="date" name="next_followup_date" id="next_followup_date" class="form-control"  >

                                                </div>


                                                <div class="col-sm-4">
                                                    
                                                        <label class="col-form-label">Lead Status </label>                                                
                                                        
                                                        <select name="leadstatus" id="leadstatus" class="form-control"  >
                                                            <option value=""> Select Status </option>
                                                            @foreach($leadStatusAll as $leadstatus )
 
                                                              @if($leadstatus['leadstatusid'] == $leaddata->leadstatus)
                                                                <option value="{{ $leadstatus['leadstatusid'] }}" selected> {{ $leadstatus['leadstatus'] }} </option>
                                                            @else
                                                            <option value="{{ $leadstatus['leadstatusid'] }}"> {{ $leadstatus['leadstatus'] }} </option>        
                                                            @endif

                                                            @endforeach
                                                        </select>
                                                        
                                                       
                                                </div>



                                                 <div class="clearfix"> &nbsp; </div>


                                                <div class="col-sm-12">                                             
                                                     <label class="col-form-label">Lead Description </label>
                                                     <textarea class="form-control"  name="lead_description" id="lead_description" cols="15" rows="5"> {{ $leaddata->lead_description ?? '' }}</textarea>
                                                </div>
                                                
                                                <div class="col-md-6"> 
                                                      <div class="clearfix"> &nbsp; </div>
                                                     <button class="btn btn-primary btn-sm leadeditbutton" type="submit">Update Lead</button>
                                                </div>
                                        </div>
                                        </form>
                                            
                                    </div>

                                   
                                </div>
                            </div>
                        </div>
                         <div class="clearfix"> &nbsp; </div>
                        <div class="col-12">
                                 <div class="product-list--area mb-50 bg-boxshadow">
                                

                                    <div class="row">
                                    <div class="col-lg-12">
                                    <!-- Ibox -->
                                    
                                    <!-- Ibox Title -->
                                    <div class="ibox-title">
                                    <h5 class="mb-30">Add Lead Remark </h5>
                                    </div>
                                    <div class="ibox-content">

                                       <form id="add_remark_form">
                                            
                                            <input type="hidden" name="leadid" id="leadid" value="{{ $leaddata->leadid ?? '' }}" >

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                            <div class="col-sm-12">                                             
                                                    <label class="col-form-label">Enter Remark </label>
                                                    <textarea class="form-control"  name="logtext" id="logtext" cols="50" rows="6"></textarea>
                                            </div>

                                            <div class="col-md-6"> 
                                                        <div class="clearfix"> &nbsp; </div>
                                                        <button class="btn btn-primary btn-sm float-right"  type="submit">Submit</button>
                                            </div>
                                        </form>

                                    
                                   
                                    </div>
                                        

                                    </div>

                                    
                                </div>
                            </div>
                        </div>




                            <div class="col-12">
                             
                             <div class="product-list--area mb-50 bg-boxshadow">
                                

                                    <div class="row">
                                    <div class="col-lg-12">
                                    <!-- Ibox -->
                                    
                                    <!-- Ibox Title -->
                                    <div class="ibox-title">
                                    <h5 class="mb-30"> Lead Remarks </h5>
                                    </div>
                                    <div class="ibox-content">

                                      <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Remark</th>
                                                    <th>Date</th>
                                                    <th>User</th>
                                                </tr>
                                            </thead>
                                            <tbody id="leadlogtbody">
                                               
                                            </tbody>
                                        </table>

                                    
                                   
                                    </div>
                                        

                                    </div>

                                    
                                </div>
                            </div>
                        </div>

                        
                        @include('include/footer');

                    </div>
                </div>
            </div>




            
                       
                                                                                                                                        

  
           





        </div>
    </div>

    <!-- jQuery 2.2.4 -->
    @include('include.footer_assets');

</body>

<script>
    
    $("#add_remark_form").validate({
        rules: {
            logtext: {
                required: true,
                minlength:20
            } 
            
        },
        messages: {
            logtext: {
                required: "Lead Remark is required"
            } 
        },        
        submitHandler: function(form,e) {
            e.preventDefault();
           
            $.ajax({
                type: 'POST',
                url: "{{route('leadremarkadd')}}",
                dataType: "html",
                data: $('#add_remark_form').serialize(),
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
 

                    $('#add_remark_form')[0].reset();

                    getleadremarkslist();
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

    </script>
<script>
$(document).ready(function(){
    
    getleadremarkslist()

});

</script>


<script>

function getleadremarkslist(){
     

    var leadid = $("#leadid").val();
    var token = $('#token').val();      

     

     $.ajax({
                type:"POST",              
                url: "{{ route('getleadloglist') }}",                
                data: { "_token": token , "leadid":leadid },
                dataType: 'json',
              
                beforeSend:function(){
                    $("#loader").show();
                },
                success: function(result){
                      
                    if(result.status === 'success'){
                       var html = "";

                    $( result.data ).each(function( key,val ) {
                          html += "<tr>";
                          html += "<td>"+ val.leadlogid +"</td>";
                          html += "<td>"+ val.logtext +"</td>";
                          html += "<td>"+ val.createddate +"</td>";
                          html += "<td>"+ val.createdby +"</td>";

                          html += "<tr>"; 
                             
                    });
                         
                        $("#leadlogtbody").html(html);
 
                    }
                    else if (result.status === 'fail'){

                       
                    } 
                       
                },
                complete:function(){
                     $("#loader").hide();
                }
            }); 
}


</script>

<script>

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
$("#lead_edit_form").validate({
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
            }
            // ,
            // customer_budget_max:{
            //     required:true,
            //     greaterThan: "#customer_budget_min"
            // },
            // customer_budget_min:{
            //     required:true
            // }

            
            
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
            },
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
                url: "{{route('leadeditsave')}}",
                dataType: "html",
                data: $('#lead_edit_form').serialize(),
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

</script>

</html>