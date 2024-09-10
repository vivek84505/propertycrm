<!DOCTYPE html>
<html lang="zxx" dir="ltr" class="light semiDark">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Colors">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title> DocProject </title>

    <!-- Favicon -->
  @include('include.header_assets');

  <style>
    .wizard-step{
      width: 220px !important;
    }
  </style>

</head>

<body class=" font-inter dashcode-app" id="body_class">
<main class="app-wrapper">


    @include('include/sidebar');
    @include('include/header');
      <div class="flex flex-col justify-between min-h-screen">
      <div>

     

      <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div class="transition-all duration-150 container-fluid" id="page_layout">
              <div id="content_layout">
                 <!-- Add New Button -->


<!-- Add user Card starts -->
<div class="card relative" id="userCard" >
  <div class="card-body flex flex-col p-6">
    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
      <div class="flex-1">
        <!-- Card title or other content can go here -->
      </div>
    </header>
    <div class="card-text h-full">
       
    
      <!-- wizard form start -->
<div class="container mx-auto mt-12">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/4 p-4 bg-white shadow-lg rounded">
            <ul id="wizard-sidebar" class="space-y-4">
                <li class="wizard-step active" data-step="1">
                    <a href="#" class="block p-6 bg-blue-500 text-white rounded">दस्तसाठी आवश्यक माहिती</a>
                </li>
                <li class="wizard-step" data-step="2">
                    <a href="#" class="block p-2 bg-gray-200 rounded">पक्षकार संपूर्ण माहीती</a>
                </li>
                <li class="wizard-step" data-step="3">
                    <a href="#" class="block p-2 bg-gray-200 rounded">Step 3</a>
                </li>
            </ul>
        </div>

        <!-- Form Content -->
        <div class="w-full md:w-3/4 p-4 bg-white shadow-lg rounded ml-4">
            <form id="wizard-form">
                <!-- Step 1 -->
                <div class="wizard-content" data-step="1">
                    <h2 class="text-lg font-bold">Step 1: Personal Information</h2>
                    <div class="grid grid-cols-4 gap-4 mt-4">
                        <!-- Input Field 1 -->
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                            <input type="text" name="name" class="border p-2 w-full" required>
                        </div>
                        <!-- Input Field 2 -->
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" class="border p-2 w-full" required>
                        </div>
                        <!-- Input Field 3 -->
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                            <input type="text" name="phone" class="border p-2 w-full" required>
                        </div>
                        <!-- Input Field 4 -->
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Date of Birth</label>
                            <input type="date" name="dob" class="border p-2 w-full" required>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="button" class="next-step bg-blue-500 text-white p-2 mt-4 rounded">Next</button>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="wizard-content hidden" data-step="2">
                    <h2 class="text-lg font-bold">Step 2: Address</h2>
                    <div class="grid grid-cols-4 gap-4 mt-4">
                        <!-- Input Field 1 -->
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Street Address</label>
                            <input type="text" name="address" class="border p-2 w-full" required>
                        </div>
                        <!-- Input Field 2 -->
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">City</label>
                            <input type="text" name="city" class="border p-2 w-full" required>
                        </div>
                        <!-- Input Field 3 -->
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">State</label>
                            <input type="text" name="state" class="border p-2 w-full" required>
                        </div>
                        <!-- Input Field 4 -->
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Postal Code</label>
                            <input type="text" name="postal_code" class="border p-2 w-full" required>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4 space-x-2">
                        <button type="button" class="previous-step bg-blue-500 text-white p-2 mt-4 rounded">Previous</button>
                        <button type="button" class="next-step bg-blue-500 text-white p-2 mt-4 rounded">Next</button>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="wizard-content hidden" data-step="3">
                    <h2 class="text-lg font-bold">Step 3: Confirm</h2>
                    <p>Please review your information before submitting.</p>
                    <button type="button" class="previous-step bg-blue-500 text-white p-2 mt-4 rounded">Previous</button>
                    <button type="submit" class="bg-green-500 text-white p-2 mt-4 rounded">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- wizard form end -->
 
    </div>
  </div>
</div>
<br/>
<!-- Add user Card End -->

    


                  </div>
                </div>

              </div>
            </div>
          
          </div>
        </div>


        @include('include/footer');

        

</main>
@include('include.footer_assets');

<script>
    $(document).ready(function () {
        let currentStep = 1;

        // Initialize jQuery validation on the form
        const form = $('#wizard-form').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    email: true
                },
                address: {
                    required: true,
                    minlength: 5
                },
                city: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Please enter your name",
                    minlength: "Your name must be at least 3 characters long"
                },
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },
                address: {
                    required: "Please enter your address",
                    minlength: "Address must be at least 5 characters long"
                },
                city: {
                    required: "Please enter your city"
                }
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element); // Default error placement
            },
            highlight: function (element) {
                $(element).addClass('border-red-500'); // Add error class
            },
            unhighlight: function (element) {
                $(element).removeClass('border-red-500'); // Remove error class
            }
        });

        // Function to show the correct step content and update sidebar
        function showStep(step) {
            // Hide all wizard steps
            $('.wizard-content').addClass('hidden');
            // Show the current step
            $(`.wizard-content[data-step="${step}"]`).removeClass('hidden');
            
            // Update sidebar active class
            $('.wizard-step').removeClass('active'); // Remove active from all
            $('.wizard-step a').removeClass('bg-blue-500 text-white').addClass('bg-gray-200'); // Reset styles

            // Add active class and styles to the current step in sidebar
            $(`.wizard-step[data-step="${step}"]`).addClass('active');
            $(`.wizard-step[data-step="${step}"] a`).addClass('bg-blue-500 text-white').removeClass('bg-gray-200');
        }

        // "Next" button click event for navigation with validation
        $('.next-step').click(function () {
            if ($('#wizard-form').valid()) {
                currentStep++;
                showStep(currentStep);
            }
        });

        // "Previous" button click event to navigate back
        $('.previous-step').click(function () {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });

        // Display the first step on page load
        showStep(currentStep);
    });
</script>



 </body>


</html>

