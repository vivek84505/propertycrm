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
                                <li class="breadcrumb-item"><a href="dashboard-1.html">Users Management</a></li>
                             </ol>
                        </nav>
                    </div>
                </div>

                 <!-- Wrapper -->
                 <div class="wrapper wrapper-content">
                    <div class="container-fluid">
                    <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox bg-boxshadow mb-50">
                                    <!-- Title -->
                                    <div class="ibox-title basic-form mb-30">
                                        <h5> Add New User  </h5>
                                    </div>
                                    <!-- Ibox-content -->
                                    <div class="ibox-content">
                                        <form method="get">
                                            <div class="form-group  row"><label class="col-sm-2 col-form-label">Firstname</label>
                                                <div class="col-sm-5"> <input type="text" name="firstname" id="firstname" class="form-control"></div>
                                            </div>
                                            <!-- Line -->
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
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">User Role</label>

                                                <div class="col-sm-5">
                                                    <select   name="user_role" id="user_role"  class="form-control"> 
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
                                                    <button class="btn btn-danger btn-sm mr-10" type="clear">Clear</button>
                                                    <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                                                </div>
                                            </div>

                                        </form>
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
                                        

                                        <!-- Table -->
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Project </th>
                                                        <th>Completed </th>
                                                        <th>Task</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="checkbox" checked="" class="i-checks" name="input[]"></td>
                                                        <td>Project<small>This is example of project</small></td>
                                                        <td><span class="pie">0.52/1.561</span></td>
                                                        <td>20%</td>
                                                        <td>Jul 14, 2013</td>
                                                        <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" class="i-checks" name="input[]"></td>
                                                        <td>Alpha project</td>
                                                        <td><span class="pie">6,9</span></td>
                                                        <td>40%</td>
                                                        <td>Jul 16, 2013</td>
                                                        <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" class="i-checks" name="input[]"></td>
                                                        <td>Betha project</td>
                                                        <td><span class="pie">3,1</span></td>
                                                        <td>75%</td>
                                                        <td>Jul 18, 2013</td>
                                                        <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" class="i-checks" name="input[]"></td>
                                                        <td>Gamma project</td>
                                                        <td><span class="pie">4,9</span></td>
                                                        <td>18%</td>
                                                        <td>Jul 22, 2013</td>
                                                        <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
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