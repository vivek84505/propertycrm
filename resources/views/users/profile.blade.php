<!DOCTYPE html>
<html lang="en">
<?php 
   
  $userdata = $userdata[0];
?>
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
  ?>

</head>

<body>

    <div class="page-wrapper">

      @include('include/header');

        <!-- ###### Layout Container Area ###### -->
        <div class="layout-container-area mt-70">
            <!-- Side Menu Area -->
           @include('include/sidebar');
           
            <!-- Layout Container -->
            <div class="layout-container sidemenu-container">
               
                 <!-- Breadcrumb Area -->
                 <div class="breadcrumb-area">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard-1.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                 <!-- Wrapper -->
                 <div class="wrapper wrapper-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card bg-boxshadow mb-50">
                                    <div class="card--body">
                                        <!-- Thumb Content -->
                                        <div class="profile_thumb_content">
                                            <div class="profile--thumb">
                                                <img src="{{ URL::asset('public/img/no-user.jpg') }}" alt="">
                                            </div>

                                            <!-- Body Content -->
                                            <div class="media-body-content">
                                                <h4 class="mb-2">{{ $userdata['firstname'] ?? '' }} {{ $userdata['lastname'] ?? '' }}</h4>
                                                <!-- Title -->
                                                <!-- <div class="profile-title-descp">
                                                    <p>Lorem ipsum dolor sit amet, nibh suavitate qualisque ut nam. Ad harum primis electram duo, porro principes ei has.</p>
                                                </div> -->

                                                <!-- <a href="#" class="d-inline-block text-dark-color mr-3">238 <span class="text-color-gray">followers</span></a> -->
                                                <!-- <a href="#" class="d-inline-block text-dark-color">118 <span class="text-color-gray">following</span></a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col">
                                <!-- Information -->
                                <div class="col-md-10">
                                <div class="card-- bg-boxshadow mb-50">
                                    <div class="card--body">
                                        <div class="row mb-2">
                                            <div class="col-4 text-muted">
                                                <h6 class="font-s--14">Registered on:</h6>
                                            </div>
                                            <div class="col-8">
                                                <?php 
                                                         if($userdata['created_at'])
                                                         $registered_date = date('d-m-Y', strtotime($userdata['created_at']));
                                                ?>
                                                <p class="mb-0"> {{ $registered_date  ?? '' }} </p>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-4 text-muted">
                                                <h6 class="font-s--14">User Role:</h6>
                                            </div>
                                            <div class="col-8">
                                                <a href="#" class="text-dark"> {{ $userdata['userrole']  ?? '' }} </a>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-4 text-muted">
                                                <h6 class="font-s--14">Email:</h6>
                                            </div>
                                            <div class="col-8">
                                                <a href="#" class="text-dark"> {{ $userdata['email']  ?? '' }} </a>
                                            </div>
                                        </div>

                                        <!-- Contact Area -->
                                      
                                        <div class="row mb-2">
                                            <div class="col-4 text-muted">
                                                <h6 class="font-s--14">Phone:</h6>
                                            </div>
                                            <div class="col-8">
                                                {{ $userdata['mobile'] ?? '' }}
                                            </div>
                                        </div>

                                       
                                        <a href="#" class="btn btn-primary btn-round changepassword">  Change Password </a> &nbsp;

                                       
                                    </div>

                                    <!-- Card Area -->
                                    <div class="card-footer text-center mt-30">
                                        <div class="row no-gutters row-bordered row-border-light">
                                            <a href="#" class="d-flex col flex-column text-dark">
                                                <div>
                                                    <h6>32</h6>
                                                </div>
                                                <div class="text-muted">posts</div>
                                            </a>

                                            <a href="#" class="d-flex col flex-column text-dark">
                                                <div>
                                                    <h6>67</h6>
                                                </div>
                                                <div class="text-muted">videos</div>
                                            </a>

                                            <a href="#" class="d-flex col flex-column text-dark">
                                                <div>
                                                    <h6>325</h6>
                                                </div>
                                                <div class="text-muted">photos</div>
                                            </a>


                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>



                          


                        </div>

                       


                    </div>
            </div>
                 

                 


                     @include('include/footer');

         

        </div>
    </div>



    <!-- User List Model --> 
        <!-- Modal -->
        <div class="modal fade" id="changepasswordModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <!-- Modal Body -->
                        <div class="modal-body">
                             <form  id="changepasswordform" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" id="user_id" name="user_id" class="edit_user_id" value="{{ Session::get('userdata')['user_id'] }}">
                            
                                    <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label class="control-label">Current Password</label>
                                                        <div>
                                                            <input type="password" name="current_password" id="current_password"  class="form-control input-lg"  value="">
                                                        </div>
                                                    </div>


                                                    <div class="form-group col-md-12 ">
                                                        <label class="control-label">New password</label>
                                                            <div>
                                                                <input type="password" name="new_password" id="new_password"  class="form-control input-lg"  value="">
                                                            </div>
                                                    </div>
                                            
                                            
                                                    <div class="form-group col-md-12 ">
                                                        <label class="control-label">Confirm password</label>
                                                        <div>
                                                            <input type="password" name="confirm_password" id="confirm_password"  class="form-control input-lg"  value="">
                                                        </div>
                                                    </div>
 
                        
                                </div>
                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                            
                                </div>
                                </div>
                               

                </div>
            </div>
        </div>
    </div>
  </div>
</div>


   

    <!-- jQuery 2.2.4 -->
    @include('include.footer_assets');

</body>

<script>
$(document).ready(function() {
    $("#changepasswordform").validate({
        rules: {
            current_password: {
                required: true
            },
            new_password: {
                required: true
            },
            confirm_password: {
                required: true,
                equalTo : "#new_password"
               
            } 
        },
        messages: {
            current_password: {
                required: "Current password is required."
            },
            new_password: {
                required: "New password is required."
            },
            confirm_password: {
                required: "Confirm password is required.",
                equalTo : "New password and confirm password mismatch."
                
            }   
        },        
        submitHandler: function(form,e) {
            e.preventDefault();
            console.log('Form submitted');
            $.ajax({
                type: 'POST',
                url: "{{route('changepassword')}}",
                dataType: "html",
                data: $('#changepasswordform').serialize(),
                beforeSend: function() {

                    $("#loader").show();
                },               
                success: function(result) {

                    result = JSON.parse(result);
                     

                    if(result.status === 'success'){

                        swal("Password Changed!", result.returnmsg, 'success');

                        setTimeout(
                        function() {
                            window.location.href = "{{route('logout')}}";
                        }, 2000); 
                        // alertify.success(result.returnmsg);    
                    }
                    else if (result.status === 'fail'){

                        swal("Password change failed!",  result.returnmsg, 'error');
                        // alertify.error(result.returnmsg);
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

});
</script>

<script>    
//Edit User JS
$('.changepassword').on('click',function(){
    
    $('#changepasswordModel').modal('show');
});
</script>


</html>