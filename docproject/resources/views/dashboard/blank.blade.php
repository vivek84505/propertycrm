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
  

</head>

<body class=" font-inter dashcode-app" id="body_class">
<main class="app-wrapper">
    @include('include/sidebar');
    @include('include/header');

    


     
     

      <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div class="transition-all duration-150 container-fluid" id="page_layout">
              <div class="content-layout">

           <div class="card h-full">
               <!-- wizard form start -->

                <div class="container mx-auto mt-10">
        <div class="flex">
            <!-- Sidebar -->
            <div class="w-1/4 p-4 bg-white shadow-lg rounded">
                <ul id="wizard-sidebar" class="space-y-4">
                    <li class="wizard-step active" data-step="1">
                        <a href="#" class="block p-2 bg-blue-500 text-white rounded">Step 1</a>
                    </li>
                    <li class="wizard-step" data-step="2">
                        <a href="#" class="block p-2 bg-gray-200 rounded">Step 2</a>
                    </li>
                    <li class="wizard-step" data-step="3">
                        <a href="#" class="block p-2 bg-gray-200 rounded">Step 3</a>
                    </li>
                </ul>
            </div>

            <!-- Form Content -->
            <div class="w-3/4 p-4 bg-white shadow-lg rounded ml-4">
                <form id="wizard-form">
                    <!-- Step 1 -->
                    <div class="wizard-content" data-step="1">
                        <h2 class="text-lg font-bold">Step 1: Personal Information</h2>
                        <div class="mt-4">
                            <label class="block">Name</label>
                            <input type="text" name="name" class="border p-2 w-full" required>
                        </div>
                        <div class="mt-4">
                            <label class="block">Email</label>
                            <input type="email" name="email" class="border p-2 w-full" required>
                        </div>
                        <button type="button" class="next-step bg-blue-500 text-white p-2 mt-4 rounded">Next</button>
                    </div>

                    <!-- Step 2 -->
                    <div class="wizard-content hidden" data-step="2">
                        <h2 class="text-lg font-bold">Step 2: Address</h2>
                        <div class="mt-4">
                            <label class="block">Address</label>
                            <input type="text" name="address" class="border p-2 w-full" required>
                        </div>
                        <div class="mt-4">
                            <label class="block">City</label>
                            <input type="text" name="city" class="border p-2 w-full" required>
                        </div>
                        <button type="button" class="next-step bg-blue-500 text-white p-2 mt-4 rounded">Next</button>
                    </div>

                    <!-- Step 3 -->
                    <div class="wizard-content hidden" data-step="3">
                        <h2 class="text-lg font-bold">Step 3: Confirm</h2>
                        <p>Please review your information before submitting.</p>
                        <button type="submit" class="bg-green-500 text-white p-2 mt-4 rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>

              <!-- wizard form end -->

              
                  </div>
    <!-- User List End -->


                  </div>
                </div>

              </div>
            </div>
          
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

            function showStep(step) {
                $('.wizard-content').addClass('hidden');
                $(`.wizard-content[data-step="${step}"]`).removeClass('hidden');
                $('.wizard-step').removeClass('active');
                $(`.wizard-step[data-step="${step}"] a`).addClass('bg-blue-500 text-white').removeClass('bg-gray-200');
            }

            $('.next-step').click(function () {
                const form = $('#wizard-form');
                form.validate();
                if (form.valid()) {
                    currentStep++;
                    showStep(currentStep);
                }
            });

            showStep(currentStep);
        });
    </script>


 </body>


</html>

