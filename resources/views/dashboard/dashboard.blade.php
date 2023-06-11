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
        <div style="margin-top:-55px !important" class="layout-container-area mt-70">
            <!-- Side Menu Area -->
           @include('include/sidebar');
           
            <!-- Layout Container -->
            <div class="layout-container sidemenu-container mt-100">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                    
                        <div class="col-sm-6 col-lg-3" onclick="window.location ='{{ url("leads") }}'"> 
                            <div class="widget-content-style yellow-bg zoom-effect mb-30">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa fa-search fa-5x"></i>
                                    </div>
                                    <div class="col-8 text-right dashboard-box-text">
                                        <span > Total Leads </span>
                                        <h2 id="total_leads" class="widget-content--text color-white"></h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    <div class="col-sm-6 col-lg-3">
                            <!-- Widget Content -->
                            <div class="widget-content-style rounded-0 two zoom-effect mb-30">
                                <div class="row">
                                    <div class="col-4">
                                        <!-- Icon -->
                                        <div class="widget-style-two-icon">
                                            <i class="fa fa-building fa-5x"></i>
                                        </div>
                                    </div>
                                    <div class="col-8 text-right">
                                        <!-- Text -->
                                        <div class="widget-style-two-text dashboard-box-text">
                                            <span >Total Projects</span>
                                            <h2 id="total_projects" class="widget-content--text"></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <!-- Widget Content -->
                            <div class="widget-content-style rounded-0 one zoom-effect mb-30">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa fa-calendar-check-o fa-5x"></i>
                                    </div>
                                    <div class="col-8 text-right dashboard-box-text">
                                        <span > Todays Followup </span>
                                        <!-- Icon -->
                                        <h2 id="todays_followup_leads" class="widget-content--text"></h2>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                        <div class="col-sm-6 col-lg-3">
                            <!-- Widget Content -->
                            <div class="widget-content-style lazur-bg zoom-effect mb-30">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa fa-envelope-o fa-5x"></i>
                                    </div>
                                    <div class="col-8 text-right dashboard-box-text">
                                        <span > Total Customers</span>
                                        <h2 id="total_customers" class="widget-content--text color-white"></h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                       

                       

                         


                         

                         

                        

                        <div class="col-md-6">
                            <div class="widget-head-box zoom-effect mb-50">
                                <div class="widget-head-bg-text">
                                    <h1>$ 2,540</h1>
                                    <h6>Annual income</h6>
                                    <p>Income form project Alpha.</p>
                                </div>
                                <!-- Icon -->
                                <div class="widget-bg-icon">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="widget-head-box bg-success zoom-effect mb-50">
                                <div class="widget-head-bg-text">
                                    <h1>$19,78,000</h1>
                                    <h6>Yearly income</h6>
                                    <p>Income form project Alpha.</p>
                                </div>
                                <!-- Icon -->
                                <div class="widget-bg-icon">
                                    <i class="fa fa-bank" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>

                         

                         

                         

                        

                         

                        
                        <div class="col-12">
                            <!-- Product List Area -->
                            <div class="product-list--area mb-50 bg-boxshadow">
                                <div class="ibox-content">
                                    <div class="row mb-30">
                                        <div class="col-12">
                                            <h5 class="title-- mb-30">Popular Pages</h5>
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

                                    <div class="col-lg-12">
                                        <!-- Ibox -->
                                        <div class="ibox">
                                            <!-- Ibox Content -->
                                            <div class="ibox-content">
                                                <!-- Footable -->
                                                <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                                    <thead>
                                                        <tr>
                                                            <th data-toggle="true">Product Name</th>
                                                            <th data-hide="phone">Model</th>
                                                            <th data-hide="all">Description</th>
                                                            <th data-hide="phone">Price</th>
                                                          

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td> Example product 1   </td>
                                                            <td>Model 1</td>
                                                            <td>Model 1</td>
                                                            <td>Model 1</td>                                                            
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td> Example product 1   </td>
                                                            <td>Model 1</td>
                                                            <td>Model 1</td>
                                                            <td>Model 1</td>                                                            
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td> Example product 1   </td>
                                                            <td>Model 1</td>
                                                            <td>Model 1</td>
                                                            <td>Model 1</td>                                                            
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td> Example product 1   </td>
                                                            <td>Model 1</td>
                                                            <td>Model 1</td>
                                                            <td>Model 1</td>                                                            
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td> Example product 1   </td>
                                                            <td>Model 1</td>
                                                            <td>Model 1</td>
                                                            <td>Model 1</td>                                                            
                                                            
                                                        </tr>
                                                         
                                                    </tbody>

                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="7">
                                                                <ul class="pagination float-right mt-30"></ul>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>

                                            </div>
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
 $(document).ready(function(){
      var token = $('#token').val();
      
      $.ajax({
          type:"POST",
          url: "{{ route('getdashboarddataall') }}",
          data: { "_token": token },
          dataType: 'json',
          beforeSend:function(){
              $("#loader").show();
          },
          success: function(res){
           
            $("#total_leads").html(res.total_leads); 
            $("#total_customers").html(res.total_customers); 
            $("#todays_followup_leads").html(res.todays_followup_leads); 
            $("#total_projects").html(res.total_projects);  

         },
         complete:function(){
             $("#loader").hide();
         }
      }); 

    });


</script>
</html>