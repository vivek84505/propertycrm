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
        <div style="margin-left:-30px" class="w-1/4 p-4 bg-white shadow-lg rounded">
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
            <form id="wizard-form" enctype='multipart/form-data'>
                <!-- Step 1 -->
                <div class="wizard-content" data-step="1">
                    <h2 class="text-lg font-bold">दस्तसाठी आवश्यक माहिती</h2>
                    <div class="grid grid-cols-4 gap-4 mt-4">
                        <!-- Input Field 1 -->
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">दस्ताचा प्रकार /Document Article</label>
                             <select name="document_type" id="document_type" class="form-control w-full mt-2">
                                  <option value="">अनुष्छेद/आर्टिकल निवडा</option>  <!-- Empty value for validation -->
                                  <option value="abhihastantaran" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">25 - अभिहस्तांतरण पत्र</option>
                                </select> 
                        </div>
                        <!-- Input Field 2 -->
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">मिळकतीचा प्रकार / Property Type</label>
                            <select name="property_type" id="property_type" class="form-control w-full mt-2" >
                                <option value="" disabled selected hidden>मिळकतीचा प्रकार निवडा</option>  
                                <option value="residential" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">रेसिडेंन्सीयल</option>
                                <option value="plot" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">प्लाॅट </option>           
                                </select> 
                        </div>
                        <!-- Input Field 3 -->
                        <div class="col-span-2">
                             <label for="document_title" class="form-label">दस्ताचा शिर्षक / Document Title</label>
                                <select name="document_title" id="document_title" class="form-control w-full mt-2" >
                                <option value="" disabled selected hidden>दस्ताचा शिर्षक निवडा</option>  
                                <option value="अभिहस्तांतरण पत्र" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">अभिहस्तांतरण पत्र</option>
                                <option value="खरेदीखत" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">खरेदीखत </option>           
                                <option value="खुषखरेदीखत" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">खुषखरेदीखत </option>           
                                <option value="फराेक्तखरेदीखत" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">फराेक्तखरेदीखत </option>           
                                <option value="विक्रीखत" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">विक्रीखत </option>           
                                <option value="हस्तांतरणपत्र" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">हस्तांतरणपत्र </option>           
                                <option value="तबदिलपत्र" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">तबदिलपत्र </option>           
                                <option value="कायम खुषखरेदीखत" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">कायम खुषखरेदीखत </option>           
                                <option value="सेल डीड" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">सेल डीड </option>           
                                <option value="कन्व्हेंन्स डीड" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">कन्व्हेंन्स डीड </option>           
                                <option value="ट्रान्सफर डीड" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">ट्रान्सफर डीड </option>           
                                <option value="असाईनमेंट+B45 डीड" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">असाईनमेंट+B45 डीड </option>           
                                <option value="असाईनमेंट डीड" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">असाईनमेंट डीड </option>           
                                </select> 
                        </div>
                        <!-- Input Field 4 -->
                        <div class="col-span-2">                         

                              <label for="property_consideration_price"  class="block text-sm font-medium text-gray-700 mb-2">माेबदला - किंमत /Consideration - Price</label>
                              <input id="property_consideration_price" name="property_consideration_price" type="number" class="border p-2 w-full" >
                        </div>

                        <div class="col-span-2">                         

                              <label for="religious_slogan"  class="block text-sm font-medium text-gray-700 mb-2">धार्मिक घाेष वाक्य /Religious slogans</label>
                              <input id="religious_slogan" name="religious_slogan" type="text" class="border p-2 w-full" >
                        </div>

                         <div class="col-span-2">                         

                              <label for="document_execution_date"  class="block text-sm font-medium text-gray-700 mb-2">दस्त निष्पादनाचा दिनांक /Doc Execution Date</label>
                              <input id="document_execution_date" name="document_execution_date" type="date" class="border p-2 w-full" >
                        </div>

                        <div class="col-span-2">                         

                              <label for="property_consideration_price"  class="block text-sm font-medium text-gray-700 mb-2">धार्मिक चिन्ह (फाेटाे) /Religious Symbols (Image)</label>
                              <input id="religious_symbol" name="religious_symbol" type="file" class="border p-2 w-full" >
                        </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="button" class="next-step bg-blue-500 text-white p-2 mt-4 rounded">Next</button>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="wizard-content hidden" data-step="2">
                    <h2 class="text-lg font-bold">पक्षकार संपूर्ण माहीती / Party Details</h2>
                    <div class="grid grid-cols-4 gap-4 mt-4">
                        <!-- Input Field 1 -->
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">पक्षकार क्रमांक</label>
                            <input id="party_number" name="party_number" type="text" value="1" class="border p-2 w-full" disabled>
                        </div>
                        <!-- Input Field 2 -->
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">पक्षकार</label>
                            <select name="party_type" id="party_type" class="form-control w-full mt-2" >
                                <option value="" disabled selected hidden>पक्षकार निवडा</option>
                                <option value="लिहून देणार" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">लिहून देणार</option>
                                <option value="लिहून घेणार" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">लिहून घेणार</option>
                                <option value="मान्यता देणार" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">मान्यता देणार</option>
                                <option value="पाॅवर ऑफ ऑटर्नि हाेल्डर / जनरल मुखत्यार/ स्पेशल मुखत्यार" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">पाॅवर ऑफ ऑटर्नि हाेल्डर / जनरल मुखत्यार/ स्पेशल मुखत्यार</option>
                        </select>
                        </div>


                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">पक्षकाराचा प्रकार</label>
                            <select name="party_sub_type" id="party_sub_type" class="form-control w-full mt-2" >
                               <option value="" disabled selected hidden>पक्षकाराचा प्रकार निवडा</option>
                                <option value="वैयक्तिक / स्वतंत्र" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">वैयक्तिक / स्वतंत्र</option>
                                <option value="प्राेप्रायटरी फर्म" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">प्राेप्रायटरी फर्म</option>
                                <option value="भागिदारी संस्था" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">भागिदारी संस्था</option>
                                <option value="लिमीटेड लायबीलीटी पार्टनरशिप (LLP)" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">लिमीटेड लायबीलीटी पार्टनरशिप (LLP)</option>
                                <option value="पब्लीक लिमीटेड कंपनी" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">पब्लीक लिमीटेड कंपनी</option>
                                <option value="प्रायव्हेट लिमीटेड कंपनी" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">प्रायव्हेट लिमीटेड कंपनी</option>
                                <option value="जाॅईंट व्हेंचर" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">जाॅईंट व्हेंचर</option>
                                <option value="ट्रस्ट" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">ट्रस्ट</option>
                                <option value="सहकारी संस्था / काेऑपरेटिव्ह साेसायटी" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">सहकारी संस्था / काेऑपरेटिव्ह साेसायटी</option>
                                <option value="एच.यू.एफ" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">एच.यू.एफ</option>
                                <option value="बॅँक" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">बॅँक</option>
                                <option value="महामंडळ" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">महामंडळ</option>
                                <option value="महानगरपालिका, नगरपालिका, नगरपरिषद, ग्रामपंचायत, जिल्हा परिषद तर्फे" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">महानगरपालिका, नगरपालिका, नगरपरिषद, ग्रामपंचायत, जिल्हा परिषद तर्फे</option>
                                <option value="महाराष्ट्र शासन तर्फे" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">महाराष्ट्र शासन तर्फे</option>
                            </select>
                        </div>

                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">तर्फे</label>
                            <select name="party_tarfe" id="party_tarfe" class="form-control w-full mt-2" disabled>
                                <option value="" disabled selected hidden>तर्फे</option>
                                <option value="अधिकृत व्यक्ती" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">अधिकृत व्यक्ती</option>
                                <option value="व्यवस्थापकीय संचालक" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">व्यवस्थापकीय संचालक</option>
                                <option value="अधिकृत भागिदार" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">अधिकृत भागिदार</option>
                                <option value="नियुक्त व्यक्ती" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">नियुक्त व्यक्ती</option>
                                <option value="अध्यक्ष" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">अध्यक्ष</option>
                                <option value="विश्वस्त" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">विश्वस्त</option>
                                <option value="मालक" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">मालक</option>
                                <option value="सचिव" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">सचिव</option>
                                <option value="सदस्य" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">सदस्य</option>
                                <option value="एच.यु.एफ. कर्ता" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">एच.यु.एफ. कर्ता</option>
                                <option value="अधिकृत संचालक" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">अधिकृत संचालक</option>
                                <option value="आयुक्त" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">आयुक्त</option>
                                <option value="मुख्याधिकारी" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">मुख्याधिकारी</option>
                                <option value="अधिकारी" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">अधिकारी</option>
                            </select>
                        </div>
                        <!-- Input Field 3 -->
                        <div class="col-span-1.5">
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
    $(document).ready(function() {
    // Listen for changes in the party_sub_type dropdown
    $('#party_sub_type').on('change', function() {
        // Get the index of the selected option
        var selectedIndex = $(this).prop('selectedIndex');

        // Set the selected index in the party_tarfe dropdown
        $('#party_tarfe').prop('selectedIndex', selectedIndex);
    });
});

    $(document).ready(function () {
        let currentStep = 1;

        // Initialize jQuery validation on the form
        const form = $('#wizard-form').validate({
            rules: {
                name: {
                    required: true,                    
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
            },
            submitHandler: function(form, e) {
            e.preventDefault();

            // Create a FormData object to include the file
            var formData = new FormData(form); // Automatically includes all form fields

            $.ajax({
                type: 'POST',
                url: "{{ route('marathidoc_submit') }}",
                data: formData,  // Send FormData object
                processData: false,  // Prevent jQuery from converting the data to a query string
                contentType: false,  // Set the content type to false as jQuery will tell the server it's a multipart request
                beforeSend: function() {
                    $("#loader").show();
                },
                success: function(result) {
                    // result = JSON.parse(result);
                    console.log('form result===>',result);
                    if (result.status === 'success') {
                        alertify.success(result.returnmsg);
                    } else if (result.status === 'fail') {
                        alertify.error(result.returnmsg);
                    }

                    $('#wizard-form')[0].reset();
                    
                },
                complete: function() {
                    $("#loader").hide();
                },
                error: function(error) {
                    console.log("Error:", error);
                }
            });

            return false;
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

