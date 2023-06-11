<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Colors">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title> Appwork - Bootstrap 4 Admin Template &amp; UI Kit</title>

    @include('include.header_assets');


</head>
<style>
.error{
    color:red;
}
body {
 

background-image: url("public/img/login.jpg");
background-repeat: no-repeat, repeat;
background-color: #cccccc;
}

</style>
<body>

    <div class="page-wrapper">
        <!-- Breadcrumb Area -->
        <!-- <div class="breadcrumb-area">
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard-1.html">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Authentication</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </nav>
            </div>
        </div> -->

        <!-- Wrapper -->

  
        <div class="wrapper wrapper-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                   

                        <!-- Middle Box -->
                        <div class="middle-box bg-boxshadow text-center">
                            <h1 class="logo-name">CRM+</h1>
                            <h4>Welcome to CRM+</h4>
                            <p>Login in. To see it in action.</p>

                            <!-- Form -->
                            <form class="form" id="loginform" >
                                <!-- Form Group -->
                                <div class="form-group">
                                    <input type="text" class="form-control"  name = "email" id = "email" placeholder="User Name" required="">
                                </div>

                                <!-- Form Group -->
                                <div class="form-group">
                                    <input type="password" class="form-control" name = "password" id = "password" placeholder="Password" required="">
                                </div>

                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />


                                <button type="submit" class="btn btn-info register">Login</button>
                                <!-- <a class="forgot_pass" href="#"><small>Forgot password?</small></a> -->
                                
                              
                            </form>

                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

     
    </div>

    <!-- jQuery 2.2.4 -->
    <!-- <script src="assets/js/jquery/jquery.2.2.4.min.js"></script> -->
    <!-- Bootsrap js -->
    <!-- <script src="assets/js/bootstrap/popper.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins-js/classy-nav.js"></script> -->

    <!-- Active js -->
    <!-- <script src="js/active.js"></script> -->
    @include('include.footer_assets');

</body>

<script>
// loginform

$(document).ready(function() {
    $("#loginform").validate({
        rules: {
            email: {
                required: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: "specify email"
            },
            password: {
                required: "specify password"
            }
        },        
        submitHandler: function(form,e) {
            e.preventDefault();
             $.ajax({
                type: 'POST',
                url: "{{route('loginprocess')}}",
                dataType: "html",
                data: $('#loginform').serialize(),
                beforeSend: function() {

                    $("#loader").show();
                },               
                success: function(result) {

                    result = JSON.parse(result);
                   
                    if(result.status === 'success'){

                        alertify.success(result.returnmsg);
                        window.location.href = "{{route('dashboard')}}";

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

});
 

</script>

</html>