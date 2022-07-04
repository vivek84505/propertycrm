  <!-- Page Top Bar Area -->
  <div class="page-top-bar-area d-flex align-items-center justify-content-between">

<!-- Logo Trigger Area -->
<div class="logo-trigger-area d-flex align-items-center">

    <!-- logo -->
    <a href="dashboard-1.html" class="logo">
        <span class="big-logo">
            <img src="img/core-img/logo.png" alt="">
        </span>
        <span class="small-logo">
            <img src="img/core-img/logo2.png" alt="">
        </span>
    </a>

    
    <!-- Trigger -->
    <div class="top-trigger">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>



<!-- User Meta -->
<div class="user-meta-data d-flex align-items-center">
    

    <!-- Profile -->
    <div class="topbar-profile">
        <!-- Thumb -->
        <div class="user---thumb">
            <img src="{{ URL::asset('public/img/no-user.jpg') }}" alt="">
        </div>
        <!-- Profile Data -->
        <div class="profile-data">
            <!-- Profile User Details -->
           
            <!-- Profile List Data -->
            <a class="profile-list--data" href="{{route('profile')}}">
                <!-- Profile icon -->
                <div class="profile--list-icon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <!-- Profile Text -->
                <div class="notification--list-body-text profile">
                    <h6>My profile</h6>
                </div>
            </a>
            
            <!-- Profile List Data -->
            <a class="profile-list--data" href="{{route('logout')}}">
                <!-- Profile icon -->
                <div class="profile--list-icon">
                    <i class="fa fa-sign-out text-danger" aria-hidden="true"></i>
                </div>
                <!-- Profile Text -->
                <div class="notification--list-body-text profile">
                     <h6>Logout</h6>  
                </div>
            </a>
        </div>
    </div>
</div>
</div>