<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>DocProject</title>
   
  @include('include.header_assets');

</head>

<body class=" font-inter skin-default">
  <!-- [if IE]> <p class="browserupgrade">
            You are using an <strong>outdated</strong> browser. Please
            <a href="https://browsehappy.com/">upgrade your browser</a> to improve
            your experience and security.
        </p> <![endif] -->

  <div class="loginwrapper">
    <div class="lg-inner-column">
      <div class="left-column relative z-[1]">
        <div class="max-w-[520px] pt-20 ltr:pl-20 rtl:pr-20">
          <!-- <a href="index.html">
            <img src="{{ URL::asset('public/images/logo/logo.svg') }}" alt="" class="mb-10 dark_logo">
            <img src="{{ URL::asset('public/images/logo/logo-white.svg') }}" alt="" class="mb-10 white_logo">
          </a> -->
          <!-- <h4>
            Unlock your Project
            <span class="text-slate-800 dark:text-slate-400 font-bold">
                            performance
                        </span>
          </h4> -->
        </div>
        <div class="absolute left-0 2xl:bottom-[-160px] bottom-[-130px] h-full w-full z-[-1]">
          <img src="{{ URL::asset('public/images/auth/ils1.svg') }}" alt="" class=" h-full w-full object-contain">
        </div>
      </div>
      <div class="right-column  relative">
        <div class="inner-content h-full flex flex-col bg-white dark:bg-slate-800">
          <div class="auth-box h-full flex flex-col justify-center">
            <div class="mobile-logo text-center mb-6 lg:hidden block">
              <a href="index.html">
                <img src="{{ URL::asset('public/images/logo/logo.svg') }}" alt="" class="mb-10 dark_logo">
                <img src="{{ URL::asset('public/images/logo/logo-white.svg') }}" alt="" class="mb-10 white_logo">
              </a>
            </div>
            <div class="text-center 2xl:mb-10 mb-4">
              <h4 class="font-medium">Sign in</h4>
              <div class="text-slate-500 text-base">
                Sign in to your account to start using DocProject
              </div>
            </div>
            <!-- BEGIN: Login Form -->
            <form class="space-y-4" id="loginform">
              <div class="fromGroup">
                <label class="block capitalize form-label">email</label>
                <div class="relative ">
                  <input type="email" name="email" class="  form-control py-2" placeholder="email" value="">
                </div>
              </div>
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />

              <div class="fromGroup">
                <label class="block capitalize form-label  ">passwrod</label>
                <div class="relative "><input type="password" name="password" class="  form-control py-2   " placeholder="password" value="">
                </div>
              </div>
              <div class="flex justify-between">
                <!-- <label class="flex items-center cursor-pointer">
                  <input type="checkbox" class="hiddens">
                  <span class="text-slate-500 dark:text-slate-400 text-sm leading-6 capitalize">Keep me signed in</span>
                </label> -->
                <!-- <a class="text-sm text-slate-800 dark:text-slate-400 leading-6 font-medium" href="forget-password-one.html">Forgot
                  Password?
                </a> -->
              </div>
              <button class="btn btn-dark block w-full text-center">Sign in</button>
            </form>
            <!-- END: Login Form -->
            <!-- <div class="relative border-b-[#9AA2AF] border-opacity-[16%] border-b pt-6">
              <div class="absolute inline-block bg-white dark:bg-slate-800 dark:text-slate-400 left-1/2 top-1/2 transform -translate-x-1/2
                                    px-4 min-w-max text-sm text-slate-500 font-normal">
                Or continue with
              </div>
            </div> -->
            <div class="max-w-[242px] mx-auto mt-8 w-full">

            
              <!-- <ul class="flex">
                <li class="flex-1">
                  <a href="#" class="inline-flex h-10 w-10 bg-[#1C9CEB] text-white text-2xl flex-col items-center justify-center rounded-full">
                    <img src="{{ URL::asset('public/images/icon/tw.svg') }}" alt="">
                  </a>
                </li>
                <li class="flex-1">
                  <a href="#" class="inline-flex h-10 w-10 bg-[#395599] text-white text-2xl flex-col items-center justify-center rounded-full">
                    <img src="{{ URL::asset('public/images/icon/fb.svg') }}" alt="">
                  </a>
                </li>
                <li class="flex-1">
                  <a href="#" class="inline-flex h-10 w-10 bg-[#0A63BC] text-white text-2xl flex-col items-center justify-center rounded-full">
                    <img src="{{ URL::asset('public/images/icon/in.svg') }}" alt="">
                  </a>
                </li>
                <li class="flex-1">
                  <a href="#" class="inline-flex h-10 w-10 bg-[#EA4335] text-white text-2xl flex-col items-center justify-center rounded-full">
                    <img src="{{ URL::asset('public/images/icon/gp.svg') }}" alt="">
                  </a>
                </li>
              </ul> -->
              
            </div>
            <!-- <div class="md:max-w-[345px] mx-auto font-normal text-slate-500 dark:text-slate-400 mt-12 uppercase text-sm">
              Don’t have an account?
              <a href="signup-one.html" class="text-slate-900 dark:text-white font-medium hover:underline">
                Sign up
              </a>
            </div> -->
          </div>
          <!-- <div class="auth-footer text-center">
            Copyright 2021, Dashcode All Rights Reserved.
          </div> -->
        </div>
      </div>
    </div>
  </div>

  @include('include.footer_assets');

</body>
<script>
// loginform

$(document).ready(function() {
    $("#loginform").validate({
        rules: {
            email: {
                required: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: "specify email"
            },
            password: {
                required: "specify password"
            }
        },        
        submitHandler: function(form,e) {
            e.preventDefault();
             $.ajax({
                type: 'POST',
                url: "{{route('loginprocess')}}",
                dataType: "html",
                data: $('#loginform').serialize(),
                beforeSend: function() {

                    $("#loader").show();
                },               
                success: function(result) {

                    result = JSON.parse(result);
                   
                    if(result.status === 'success'){

                        alertify.success(result.returnmsg);
                        window.location.href = "{{route('dashboard')}}";

                    }
                    else if (result.status === 'fail'){
                        alertify.error(result.returnmsg);
                    } 
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
</html>