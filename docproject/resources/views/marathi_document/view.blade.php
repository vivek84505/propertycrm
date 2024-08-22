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
    .separatorline {
    border-top-width: 5px; /* Adjust the thickness as needed */
    border-color: #152030; /* Optional: Set the border color */
    
   
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
 

<!-- Add Document Card starts -->
<div class="card relative" id="userCard" >
  <div class="card-body flex flex-col p-6">
    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
      <div class="flex-1">
        <!-- Card title or other content can go here -->
      </div>
    </header>


   <div class="card-text h-full">
  <form id="marathidoc_form">
    <div class="form-group">
      <!-- Section 1: Personal Information -->
      <h3 class="text-lg font-semibold mb-4">दस्तसाठी आवश्यक माहिती / Required Information</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="input-area">
          <label for="document_type" class="form-label">दस्ताचा प्रकार /Document Article </label>
          <select name="document_type" id="document_type" class="form-control w-full mt-2" placeholder="अनुष्छेद/आर्टिकल निवडा">
              <option value="" disabled selected hidden>अनुष्छेद/आर्टिकल निवडा</option>  
              <option value="abhihastantaran" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">25 - अभिहस्तांतरण पत्र</option>
           
          </select>        
        </div>

        <div class="input-area">
           <label for="property_type" class="form-label">मिळकतीचा प्रकार / Property Type</label>
          <select name="property_type" id="property_type" class="form-control w-full mt-2" >
              <option value="" disabled selected hidden>मिळकतीचा प्रकार निवडा</option>  
              <option value="residential" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">रेसिडेंन्सीयल</option>
              <option value="plot" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">प्लाॅट </option>           
          </select>     
        </div>

         <div class="input-area">
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

        <div class="input-area">
          <label for="property_consideration_price" class="form-label">माेबदला - किंमत /Consideration - Price</label>
          <input id="property_consideration_price" name="property_consideration_price" type="number" class="form-control" >
        </div>

        <div class="input-area">
          <label for="religious_slogan" class="form-label">धार्मिक घाेष वाक्य /Religious slogans</label>
          <input id="religious_slogan" name="religious_slogan" type="text" class="form-control" >
        </div>

          <div class="input-area">
          <label for="document_execution_date" class="form-label">दस्त निष्पादनाचा दिनांक /Document Execution Date</label>
          <input id="document_execution_date" name="document_execution_date" type="date" class="form-control" >
        </div>

        <div class="input-area">
          <label for="religious_symbol" class="form-label">धार्मिक चिन्ह (फाेटाे) /Religious Symbols (Image)</label>
          <input id="religious_symbol" name="religious_symbol" type="file" class="form-control" >
        </div>

      </div>

      <!-- CSRF Token -->
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
     
      <!-- Separator -->
    <hr class="separatorline my-8 border-t-8 border-gray-300">

      <!-- Section 2: Contact Information -->
      <h3 class="text-lg font-semibold mt-8 mb-4"> पक्षकार संपूर्ण माहीती / Party Details</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="input-area">
          <label for="mobile" class="form-label">Mobile</label>
          <input id="mobile" name="mobile" type="text" class="form-control" placeholder="Mobile">
        </div>

        <div class="input-area">
          <label for="userrole" class="form-label">Role</label>
          <select name="userrole" id="userrole" class="form-control w-full mt-2">
            <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select Role</option>
            <option value="superadmin" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Super Admin</option>
            <option value="admin" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Admin</option>
            <option value="user" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">User</option>
          </select>
        </div>
      </div>

    </div>
    <button class="btn flex justify-center btn-dark mt-5 ml-auto">Submit</button>
  </form>
</div>

  </div>
</div>
<br/>
<!-- Add Document Card End -->

    

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
    $("#marathidoc_form").validate({
        rules: {
            document_type: {
                required: true
            },
            property_type: {
                required: true
            },
            document_title: {
                required: true,                 
            },
            property_consideration_price: {
                required: true
            },
            religious_slogan: {
                required: true
            },
            religious_symbol: {
                required: true
            },
            document_execution_date: {
                required: true
            }
        },
        messages: {
            document_type: {
                required: "This Field is required"
            },
            property_type: {
                required: "This Field is required"
            },
            document_title: {
                required: "This Field is required"
            },
           property_consideration_price: {
                required: "This Field is required"
            },
           religious_slogan: {
                required: "This Field is required"
            },
           religious_symbol: {
                required: "This Field is required"
            },
            document_execution_date: {
                required: "This Field is required"
            }            
             
        },        
        submitHandler: function(form,e) {
            e.preventDefault();
            console.log('Form submitted');
            $.ajax({
                type: 'POST',
                url: "{{route('useradd')}}",
                dataType: "html",
                data: $('#marathidoc_form').serialize(),
                beforeSend: function() {

                    $("#loader").show();
                },               
                success: function(result) {

                    result = JSON.parse(result);
                   
                    if(result.status === 'success'){

                        alertify.success(result.returnmsg);    
                                

                    }
                    else if (result.status === 'fail'){
                        alertify.error(result.returnmsg);
                    } 

                    $('#marathidoc_form')[0].reset();

                    getuserlist();
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

<script>

    
$(document).ready(function(){
    
});

 

 

</script>

 </body>


</html>

