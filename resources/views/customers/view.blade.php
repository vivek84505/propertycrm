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
                                <li class="breadcrumb-item"><a href="#">Customers List</a></li>
                              
                             </ol>
                             <button class="btn btn-info btn-sm btn-lg float-right" type="button" data-toggle="modal" data-target="#addCustomerModal"> Add New Customer</button>

                        </nav>
                    </div>
                </div>

                
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


                 <!-- Wrapper -->
                 <div class="wrapper wrapper-content">
                    <div class="container-fluid">
                    <div id="demo" class="collapse" >
                        <div class="row">
 
                                      
                                    <!-- Add Customer Modal -->



                                
                        </div>
                        </div>



                        <!-- Users Table -->

                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Ibox -->
                                <div class="ibox bg-boxshadow mb-50">
                                    <!-- Ibox Title -->
                                    <div class="ibox-title">
                                        <h5 class="mb-30">Customer List </h5>
                                    </div>
                                    <div class="ibox-content">
                                        
                                      <div id="customerlist">

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
 <script>

    
$(document).ready(function(){
    
     
    getcustomersAll();
   
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

                    $('#addcustomer_entry_form')[0].reset();

                    getcustomersAll();
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
$('#customerid').select2({
  selectOnClose: true
});
  
</script>
 

<script>
     

    async function getcustomersAll(){
   
     var token = $('#token').val();
      
      $.ajax({
          type:"POST",
          url: "{{ route('getcustomerlistall') }}",
          data: { "_token": token },
          dataType: 'json',
          beforeSend:function(){
              $("#loader").show();
          },
          success: function(res){
             
           if(res.html){

                $("#customerlist").html(res.html);
 
            } 

         },
         complete:function(){
             $("#loader").hide();
         }
      }); 
}
</script>

 
</html>