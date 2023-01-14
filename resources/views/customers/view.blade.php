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
                                <li class="breadcrumb-item"><a href="#">Client Management</a></li>
                              
                             </ol>
                             <button data-toggle="collapse" data-target="#demo"class="btn btn-primary btn-sm btn-lg float-right" >Add Client </button></br>
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
                                        <h5> Add New Client  </h5>
                                    </div>
                                    <!-- Ibox-content -->
                                    <div class="ibox-content">
                                     
                                    <form id="addcustomer_form" >
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

                                            <div class="col-md-4">
                                                <label class="col-form-label">Website</label>
                                                <input type="text" name="website" id="website" class="form-control" >
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <label class="col-form-label">State</label>                                                
                                                <select name="state" id="state" class="form-control"  >
                                                     <option value=""> Select State </option>
                                                    @foreach($states as $state )
                                                    <option value="{{ $state['state_id'] }}"> {{ $state['state_name'] }} </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                             <div class="col-md-4">
                                                <label class="col-form-label">District</label>                                                
                                                <select name="district" id="district" class="form-control"  >
                                                    
                                                </select>
                                            </div>


                                            


                                            <div class="col-md-4">
                                                 <label class="col-form-label">City</label>
                                                <input type="text" name="city" id="city" class="form-control" >
                                            </div>


                                            <div class="col-md-4">
                                                <label class="col-form-label">pincode</label>
                                                <input type="text" name="pincode" id="pincode" class="form-control" >
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Address</label>
                                                <input type="text" name="address" id="address" class="form-control" >
                                            </div>

 
                                        </div>
                                        <div class="clearfix"> &nbsp; </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-danger btn-sm mr-10" type="reset"  >Clear</button>
                                            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                                         </div>
                                    </form>


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
                                        <h5 class="mb-30">Client List </h5>
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
    
    getcustomerlist();

   
});

function getcustomerlist(){
   
     var token = $('#token').val();
      
      $.ajax({
          type:"POST",
          url: "{{ route('customersgetall') }}",
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
    $("#addcustomer_form").validate({
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
            }
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
            }            
             
        },        
        submitHandler: function(form,e) {
            e.preventDefault();
            console.log('Form submitted');
            $.ajax({
                type: 'POST',
                url: "{{route('customeradd')}}",
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

                    getcustomerlist();
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

</html>