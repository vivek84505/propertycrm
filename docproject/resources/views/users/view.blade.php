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
                  <!-- Add user Card starts -->
<div class="card relative">
  <div class="card-body flex flex-col p-6">
    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
      <div class="flex-1">
       
      </div>
      <button 
        class="btn inline-flex justify-center btn-outline-dark !bg-black-500 !text-white absolute top-0 right-0 mt-2 mr-2"
        id="toggleFormButton">
        <span class="flex items-center">
          <iconify-icon class="text-2xl ltr:mr-2 rtl:ml-2" icon="ic:round-plus"></iconify-icon>
          <span>Add New</span>
        </span>
      </button>
    </header>
    <div id="userForm" class="card-text h-full" style="display: none;">
      <form>
        <div class="from-group">
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="input-area">
              <label for="firstName" class="form-label">First Name</label>
              <input id="firstName" type="text" class="form-control" value="Bill" placeholder="First Name">
            </div>
            <div class="input-area">
              <label for="lastName" class="form-label">Last Name</label>
              <input id="lastName" type="text" class="form-control" value="Jhone" placeholder="Last Name">
            </div>
            <div class="flex justify-between items-end space-x-6">
              <div class="input-area w-full">
                <label for="phone" class="form-label">Phone Number</label>
                <input id="phone" type="tel" class="form-control" value="1234569870" placeholder="Phone Number">
              </div>
              <button class="inline-flex items-center justify-center h-10 w-10 bg-danger-500 text-lg border rounded border-danger-500 text-white rb-zeplin-focused">
                <iconify-icon icon="fluent:delete-20-regular"></iconify-icon>
              </button>
            </div>
          </div>
        </div>
        <button class="btn flex justify-center btn-dark mt-5 ml-auto">Submit</button>
      </form>
    </div>
  </div>
</div>
<br/>
<!-- Add user Card End -->

    <!-- User List Start -->
    <div class="card">
                    <header class=" card-header noborder">
                      <h4 class="card-title">User List
                      </h4>
                    </header>
                    <div class="card-body px-6 pb-6">
                      <div class="overflow-x-auto -mx-6 dashcode-data-table">
                        <span class=" col-span-8  hidden"></span>
                        <span class="  col-span-4 hidden"></span>
                        <div class="inline-block min-w-full align-middle">
                           <div id="userlist">

                            </div>      
                        </div>
                      </div>
                    </div>
                  </div>
    <!-- User List End -->


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
  document.getElementById('toggleFormButton').addEventListener('click', function() {
    var form = document.getElementById('userForm');
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
  });
</script>


<script>

    
$(document).ready(function(){
    
    getuserlist();

   
});

function getuserlist(){
   
     var token = $('#token').val();
      
      $.ajax({
          type:"POST",
          url: "{{ route('usersgetall') }}",
          data: { "_token": token },
          dataType: 'json',
          beforeSend:function(){
              $("#loader").show();
          },
          success: function(res){
             
           
            if(res.html){

                $("#userlist").html(res.html);
 
            }


         },
         complete:function(){
             $("#loader").hide();
         }
      }); 
}

 

</script>

 </body>


</html>

