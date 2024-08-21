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
          <label for="firstName" class="form-label">दस्ताचा प्रकार /Document Article </label>
          <input id="document_type" name="document_type" type="text" class="form-control" placeholder="First Name">
        </div>

        <div class="input-area">
          <label for="lastName" class="form-label">Last Name</label>
          <input id="lastname" name="lastname" type="text" class="form-control" placeholder="Last Name">
        </div>

        <div class="input-area">
          <label for="email" class="form-label">Email</label>
          <input id="email" name="email" type="email" class="form-control" placeholder="Email">
        </div>
      </div>

      <!-- CSRF Token -->
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />

      <!-- Section 2: Contact Information -->
      <h3 class="text-lg font-semibold mt-8 mb-4">Contact Information</h3>
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
  document.getElementById('toggleCardButton').addEventListener('click', function() {
    var card = document.getElementById('userCard');
    card.style.display = card.style.display === 'none' ? 'block' : 'none';
  });
</script>


<script>
    $(document).ready(function() {
    $("#marathidoc_form").validate({
        rules: {
            firstname: {
                required: true
            },
            lastname: {
                required: true
            },
            email: {
                required: true,
                email:true
            },
            mobile: {
                required: true
            },
            userrole: {
                required: true
            }
        },
        messages: {
            firstname: {
                required: "Firstname is required"
            },
            lastname: {
                required: "Lastname is required"
            },
            email: {
                required: "Email is required"
                
            },
            mobile: {
                required:  "Mobile is required"
            },
            userrole: {
                required:  "User Role is required"
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

