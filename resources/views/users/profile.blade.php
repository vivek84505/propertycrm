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
                                                         if($userdata['createddate'])
                                                         $registered_date = date('d-m-Y', strtotime($userdata['createddate']));
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

                                       
                                        <a href="#" class="btn btn-primary btn-round">  Change Password </a> &nbsp;

                                       
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

   

    <!-- jQuery 2.2.4 -->
    @include('include.footer_assets');

</body>

</html>