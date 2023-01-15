 


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
        <div class="layout-container-area mt-70">
            <!-- Side Menu Area -->
           @include('include/sidebar');
           
            <!-- Layout Container -->
            <div class="layout-container sidemenu-container mt-100">
                <div class="container-fluid">
                    <div class="row justify-content-center"> 
                        <div class="col-7">
                            <!-- Product List Area -->
                            <div class="product-list--area mb-80 bg-boxshadow">
                                <div class="ibox-content">
                                    <div class="row mb-40">
                                        <div  class="col-md-12">
                                            <h5 class="title-- mb-30">Edit Lead </h5>
                                        </div>
                                        
                                        <form id="addcustomer_form" >
                                            <div class="row">
                                                 
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
                                                </select>
                                                </div>


                                                


                                                <div class="col-sm-6">
                                                    
                                                        <label class="col-form-label">City</label>
                                                        <input type="text" name="city" id="city" class="form-control" value="{{ $leaddata->city ?? '' }}" >
                                                    
                                                </div>


                                                <div class="col-sm-4">
                                                    
                                                        <label class="col-form-label">Lead Source </label>                                                
                                                        <select name="leadsource" id="leadsource" class="form-control"  >
                                                            <option value=""> Select Source </option>
                                                            @foreach($leadSourceData as $leadsource )
                                                            <option value="{{ $leadsource['leadsourceid'] }}"> {{ $leadsource['leadsource'] }} </option>
                                                            @endforeach 
                                                        </select> 
                                                </div>


                                                <div class="col-sm-4">
                                                    
                                                    <label class="col-form-label">Property Type </label>                                                
                                                        <select name="property_type" id="property_type" class="form-control"  >
                                                            <option value=""> Select Type </option>                                                     
                                                            <option value="resedential"> Resedential </option>
                                                            <option value="commercial"> Commercial </option>
                                                            <option value="plot"> Plot </option>
                                                        
                                                        </select>
                                                </div>


                                                <div class="col-sm-4">
                                                    
                                                        <label class="col-form-label">Units Interested In </label> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;                                        
                                                        <select   name="units_interested_in[]" id="units_interested_in" class="form-control"  multiple="multiple"  >
                                                                                                            
                                                            <option value="1-1BHK"> 1BHK </option>
                                                            <option value="2-1.5BHK"> 1.5BHK </option>
                                                            <option value="3-2BHK"> 2BHK </option>
                                                            <option value="4-2.5BHK"> 2.5BHK </option>
                                                            <option value="5-3BHK"> 3BHK </option>   
                                                        </select>  
                                                </div>

                                                <div class="col-sm-4">                                             
                                                    <label class="col-form-label">Min Budget </label>                                                
                                                        <select   name="customer_budget_min" id="customer_budget_min" class="form-control"    >
                                                            <option value=""> Select price </option>                                                     
                                                                <option value="500000">₹5 Lac</option>
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
                                                        
                                                        </select>
                                                </div>



                                                <div class="col-sm-4">                                             
                                                    <label class="col-form-label">Max Budget </label>                                                
                                                        <select   name="customer_budget_max" id="customer_budget_max" class="form-control"    >
                                                            <option value=""> Select price </option>                                                     
                                                                <option value="500000">₹5 Lac</option>
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
                                                        
                                                        </select>
                                                </div>

                                                <div class="col-sm-4">                                             
                                                    <label class="col-form-label">Loan Required </label>                                                
                                                        <select name="loan_required" id="loan_required" class="form-control"  >
                                                            <option value=""> Select </option>
                                                            <option value="1"> YES </option>
                                                            <option value="0"> NO </option>
                                                            
                                                        </select>
                                                </div>

                                                 <div class="clearfix"> &nbsp; </div>


                                                <div class="col-sm-6">                                             
                                                     <label class="col-form-label">Lead Description </label>
                                                     <textarea class="form-control"  name="lead_description" id="lead_description" cols="20" rows="10"></textarea>
                                                </div>
                                                
                                                <div class="col-md-6"> 
                                                     <button class="btn btn-primary btn-sm" type="submit">Update Lead</button>
                                                </div>
                                        </div>
                                        </form>
                                            
                                    </div>

                                   
                                </div>
                            </div>
                        </div>

                         <div class="col-5">
                            <!-- Product List Area -->
                            <div class="product-list--area mb-50 bg-boxshadow">
                                <div class="ibox-content">
                                    <div class="row mb-30">
                                        <div class="col-12">
                                            <h5 class="title-- mb-30">Edit Lead</h5>
                                        </div>
                                        <!-- Form -->
                                        <div class="col-sm-4">
                                             
                                                <label class="col-form-label" for="product_name">Product Name</label>
                                                <input type="text" id="product_name" name="product_name" value="" placeholder="Product Name" class="form-control">
                                             
                                        </div>
                                        <!-- Form -->
                                        <div class="col-sm-2">
                                            
                                                <label class="col-form-label" for="price">Price</label>
                                                <input type="text" id="price" name="price" value="" placeholder="Price" class="form-control">
                                             
                                        </div>
                                        <!-- Form -->
                                        <div class="col-sm-2">
                                            
                                                <label class="col-form-label" for="quantity">Quantity</label>
                                                <input type="text" id="quantity" name="quantity" value="" placeholder="Quantity" class="form-control">
                                             
                                        </div>
                                        <!-- Form -->
                                        <div class="col-sm-4">
                                             
                                                <label class="col-form-label" for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="1" selected>Enabled</option>
                                                    <option value="0">Disabled</option>
                                                </select>
                                             
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



</html>