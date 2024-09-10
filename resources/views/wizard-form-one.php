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

  <style>
    .wizard-sidebar {
      height: 100%;
      padding-top: 20px;
    }
    .wizard-content {
      padding: 20px;
    }
    .wizard-step.active {
      font-weight: bold;
    }
  </style>


</head>

<body>

    <div class="page-wrapper">

      @include('include/header');

      
        <!-- ###### Layout Container Area ###### -->
            <!-- Side Menu Area -->
           @include('include/sidebar');
                   <div class="layout-container-area mt-70">

            <!-- Layout Container -->
            <div class="layout-container sidemenu-container mt-100">
                <div class="container-fluid">
                         <!-- wizard form start -->

    <div class="row">
      <!-- Sidebar -->
       
      <div class="col-md-3 wizard-sidebar">
        <ul class="list-group">
          <li class="list-group-item wizard-step active">Step 1</li>
          <li class="list-group-item wizard-step">Step 2</li>
          <li class="list-group-item wizard-step">Step 3</li>
        </ul>
      </div>
      <!-- Form Content -->
      <div class="col-md-9 wizard-content">
        <form id="wizard-form">
          <!-- Step 1 -->
          <div id="step-1" class="wizard-step-content active">
            <h3>Step 1</h3>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="button" class="btn btn-primary next-btn">Next</button>
          </div>
          <!-- Step 2 -->
          <div id="step-2" class="wizard-step-content d-none">
            <h3>Step 2</h3>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="button" class="btn btn-secondary prev-btn">Previous</button>
            <button type="button" class="btn btn-primary next-btn">Next</button>
          </div>
          <!-- Step 3 -->
          <div id="step-3" class="wizard-step-content d-none">
            <h3>Step 3</h3>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="button" class="btn btn-secondary prev-btn">Previous</button>
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
                         <!-- wizard form end -->

                    

                                    @include('include/footer');
                

            </div>





        </div>


    </div>


    <script>
    $(document).ready(function () {
      var currentStep = 1;
      var totalSteps = 3;

      function showStep(step) {
        $('.wizard-step-content').addClass('d-none');
        $('#step-' + step).removeClass('d-none');
        $('.wizard-step').removeClass('active');
        $('.wizard-step').eq(step - 1).addClass('active');
      }

      $('.next-btn').click(function () {
        var form = $('#wizard-form');
        form.validate();  // Initialize form validation

        if (form.valid()) {
          if (currentStep < totalSteps) {
            currentStep++;
            showStep(currentStep);
          }
        }
      });

      $('.prev-btn').click(function () {
        if (currentStep > 1) {
          currentStep--;
          showStep(currentStep);
        }
      });

      $('#wizard-form').validate({
        errorElement: 'div',
        errorClass: 'invalid-feedback',
        highlight: function (element) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element) {
          $(element).removeClass('is-invalid');
        },
        errorPlacement: function (error, element) {
          error.insertAfter(element);
        }
      });
    });
  </script>

    <!-- jQuery 2.2.4 -->
    @include('include.footer_assets');

</body>

</html>