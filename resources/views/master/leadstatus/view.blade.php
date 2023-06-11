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
                                <li class="breadcrumb-item"><a href="#">Lead Status Master</a></li>
                              
                             </ol>
                             <button data-toggle="collapse" data-target="#demo"class="btn btn-info btn-sm btn-lg float-right" >Add Lead Status</button></br>
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
                                        <h5> Add Lead Status  </h5>
                                    </div>
                                    <!-- Ibox-content -->
                                    <div class="ibox-content">
                                        <form id="addleadstatus_form">
                                            <div class="form-group  row"><label class="col-sm-2 col-form-label">Lead Status</label>
                                                <div class="col-sm-5"> <input type="text" name="leadstatus" id="leadstatus" class="form-control"></div>
                                            </div>
                                            <!-- Line -->
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />



                                           
                                            <div class="ap-line-dashed"></div>

                                            <div class="form-group mb-0 row">
                                                <div class="col-12">
                                                    <button class="btn btn-danger btn-sm mr-10" type="reset">Clear</button>

                                                    <button class="btn btn-info btn-sm" type="submit">Save changes</button>
                                                </div>
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
                                        <h5 class="mb-30">Lead Status List </h5>
                                    </div>
                                    <div class="ibox-content">
                                        
                                      <div id="leadstatuslist">

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
    
    getleadstatuselist();

   
});

function getleadstatuselist(){
   
     var token = $('#token').val();
      
      $.ajax({
          type:"POST",
          url: "{{ route('leadstatusgetall') }}",
          data: { "_token": token },
          dataType: 'json',
          beforeSend:function(){
              $("#loader").show();
          },
          success: function(res){
            

            if(res.html){

                $("#leadstatuslist").html(res.html);
 
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

    $("#addleadstatus_form").validate({
        rules: {
            leadstatus: {
                required: true,
                maxlength:30
            } 
        },
        messages: {
            leadstatus: {
                required: "Lead Status is required",
                maxlength: "Max limit 30 characters"
            } 
        },        
        submitHandler: function(form,e) {
            e.preventDefault();
            console.log('Form submitted');
            $.ajax({
                type: 'POST',
                url: "{{route('leadstatusadd')}}",
                dataType: "html",
                data: $('#addleadstatus_form').serialize(),
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

                    $('#addleadstatus_form')[0].reset();

                    getleadstatuselist();
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

</html>