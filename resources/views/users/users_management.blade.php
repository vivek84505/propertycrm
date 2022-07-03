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
                                <li class="breadcrumb-item"><a href="dashboard-1.html">Users Management</a></li>
                              
                             </ol>
                             <button data-toggle="collapse" data-target="#demo"class="btn btn-primary btn-sm btn-lg float-right" >Add User</button></br>
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
                                        <h5> Add New User  </h5>
                                    </div>
                                    <!-- Ibox-content -->
                                    <div class="ibox-content">
                                        <form id="adduser_form">
                                            <div class="form-group  row"><label class="col-sm-2 col-form-label">Firstname</label>
                                                <div class="col-sm-5"> <input type="text" name="firstname" id="firstname" class="form-control"></div>
                                            </div>
                                            <!-- Line -->
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />



                                            <div class="ap-line-dashed"></div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Last Name</label>
                                                <div class="col-sm-5"><input type="text" name="lastname" id="lastname" class="form-control">  
                                                </div>
                                            </div>
                                            <!-- Line -->
                                            <div class="ap-line-dashed"></div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Email</label>

                                                <div class="col-sm-5"><input type="email" name="email" id="email" class="form-control" name="password"></div>
                                            </div>

                                            <div class="ap-line-dashed"></div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Mobile</label>

                                                <div class="col-sm-5"><input type="text" name="mobile" id="mobile" class="form-control" name="password"></div>
                                            </div>


                                            <div class="ap-line-dashed"></div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">User Role</label>

                                                <div class="col-sm-5">
                                                    <select   name="userrole" id="userrole"  class="form-control"> 
                                                           <option value="">Select Role </option>             
                                                           <option value="superadmin"> Super Admin </option>             
                                                           <option value="admin"> Admin </option>             
                                                           <option value="user"> User </option>             
                                                    </select>
                                                 </div>
                                            </div>
                                           
                                            <div class="ap-line-dashed"></div>

                                            <div class="form-group mb-0 row">
                                                <div class="col-12">
                                                    <button class="btn btn-danger btn-sm mr-10" type="clear"  >Clear</button>

                                                    <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
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
                                        <h5 class="mb-30">User List </h5>
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
    
    getuserlist();

   
});

function getuserlist(){
   
     var token = $('#token').val();
      
      $.ajax({
          type:"POST",
          url: "{{ route('usersgetall') }}",
          data: { "_token": token },
          dataType: 'json',
          beforeSend:function(){
              $("#loader").show();
          },
          success: function(res){
             
           
            if(res.html){

                $("#userlist").html(res.html);
                $("#main-content").css({ overflow:"auto" });

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
    $("#adduser_form").validate({
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
            userrole: {
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
            userrole: {
                required:  "User Role is required"
            }           
             
        },        
        submitHandler: function(form,e) {
            e.preventDefault();
            console.log('Form submitted');
            $.ajax({
                type: 'POST',
                url: "{{route('useradd')}}",
                dataType: "html",
                data: $('#adduser_form').serialize(),
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

                    $('#adduser_form')[0].reset();

                    getuserlist();
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