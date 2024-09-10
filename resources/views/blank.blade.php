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

    // Function to show a particular step
    function showStep(step) {
      $('.wizard-step-content').addClass('d-none'); // Hide all steps
      $('#step-' + step).removeClass('d-none');     // Show the selected step
      $('.wizard-step').removeClass('active');      // Remove active class from all steps
      $('.wizard-step').eq(step - 1).addClass('active'); // Highlight the current step
    }

    // Initialize jQuery validation for the form
    $('#wizard-form').validate({
      errorElement: 'div',
      errorClass: 'invalid-feedback',
      highlight: function (element) {
        $(element).addClass('is-invalid');  // Add 'is-invalid' class on error
      },
      unhighlight: function (element) {
        $(element).removeClass('is-invalid');  // Remove 'is-invalid' class on valid
      },
      errorPlacement: function (error, element) {
        error.insertAfter(element); // Place error message after the input element
      },
      // Custom validation rules (optional)
      rules: {
        name: {
          required: true,
          minlength: 3
        },
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
          minlength: 6
        }
      },
      messages: {
        name: {
          required: "Please enter your name",
          minlength: "Your name must be at least 3 characters long"
        },
        email: {
          required: "Please enter your email address",
          email: "Please enter a valid email address"
        },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 6 characters long"
        }
      }
    });

    // Next Button Click Handler
    $('.next-btn').click(function () {
      // Trigger validation for the current step
      var form = $('#wizard-form');

      // Check if the current step's fields are valid
      if (form.valid()) {
        if (currentStep < totalSteps) {
          currentStep++;  // Move to the next step
          showStep(currentStep);  // Display the next step
        }
      }
    });

    // Previous Button Click Handler
    $('.prev-btn').click(function () {
      if (currentStep > 1) {
        currentStep--;  // Move to the previous step
        showStep(currentStep);  // Display the previous step
      }
    });

    // Initially show the first step
    showStep(currentStep);
  });
</script>

    <!-- jQuery 2.2.4 -->
    @include('include.footer_assets');

</body>

</html>