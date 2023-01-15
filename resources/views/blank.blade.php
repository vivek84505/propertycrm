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
                        <div class="col-6">
                            <!-- Product List Area -->
                            <div class="product-list--area mb-50 bg-boxshadow">
                                <div class="ibox-content">
                                    <div class="row mb-30">
                                        <div class="col-12">
                                            <h5 class="title-- mb-30">Edit Lead</h5>
                                        </div>
                                        <!-- Form -->
                                        <div class="col-sm-4">
                                            <form action="#">
                                                <label class="col-form-label" for="product_name">Product Name</label>
                                                <input type="text" id="product_name" name="product_name" value="" placeholder="Product Name" class="form-control">
                                            </form>
                                        </div>
                                        <!-- Form -->
                                        <div class="col-sm-2">
                                            <form action="#">
                                                <label class="col-form-label" for="price">Price</label>
                                                <input type="text" id="price" name="price" value="" placeholder="Price" class="form-control">
                                            </form>
                                        </div>
                                        <!-- Form -->
                                        <div class="col-sm-2">
                                            <form action="#">
                                                <label class="col-form-label" for="quantity">Quantity</label>
                                                <input type="text" id="quantity" name="quantity" value="" placeholder="Quantity" class="form-control">
                                            </form>
                                        </div>
                                        <!-- Form -->
                                        <div class="col-sm-4">
                                            <form action="#">
                                                <label class="col-form-label" for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="1" selected>Enabled</option>
                                                    <option value="0">Disabled</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>

                                   
                                </div>
                            </div>
                        </div>

                         <div class="col-6">
                            <!-- Product List Area -->
                            <div class="product-list--area mb-50 bg-boxshadow">
                                <div class="ibox-content">
                                    <div class="row mb-30">
                                        <div class="col-12">
                                            <h5 class="title-- mb-30">Edit Lead</h5>
                                        </div>
                                        <!-- Form -->
                                        <div class="col-sm-4">
                                            <form action="#">
                                                <label class="col-form-label" for="product_name">Product Name</label>
                                                <input type="text" id="product_name" name="product_name" value="" placeholder="Product Name" class="form-control">
                                            </form>
                                        </div>
                                        <!-- Form -->
                                        <div class="col-sm-2">
                                            <form action="#">
                                                <label class="col-form-label" for="price">Price</label>
                                                <input type="text" id="price" name="price" value="" placeholder="Price" class="form-control">
                                            </form>
                                        </div>
                                        <!-- Form -->
                                        <div class="col-sm-2">
                                            <form action="#">
                                                <label class="col-form-label" for="quantity">Quantity</label>
                                                <input type="text" id="quantity" name="quantity" value="" placeholder="Quantity" class="form-control">
                                            </form>
                                        </div>
                                        <!-- Form -->
                                        <div class="col-sm-4">
                                            <form action="#">
                                                <label class="col-form-label" for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="1" selected>Enabled</option>
                                                    <option value="0">Disabled</option>
                                                </select>
                                            </form>
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

</html>