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
            <img src="{{ URL::asset('public/img/member-img/member-5.jpg') }}" alt="">
        </div>
        <!-- Profile Data -->
        <div class="profile-data">
            <!-- Profile User Details -->
            <div class="profile-user--details" style="background-image: url({{ URL::asset('public/img/thumbnails-img/profile-bg.jpg') }});">
                <!-- Thumb -->
                <div class="profile---thumb-det">
                    <img src="{{ URL::asset('public/img/member-img/member-2.jpg') }}" alt="">
                </div>
                <!-- Profile Text -->
                <div class="profile---text-details">
                    <h6>Mark Smith</h6>
                    <a href="dashboard-1.html">mark.ste@gmail.com</a>
                </div>
            </div>
            <!-- Profile List Data -->
            <a class="profile-list--data" href="#">
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
            <a class="profile-list--data" href="#">
                <!-- Profile icon -->
                <div class="profile--list-icon">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                </div>
                <!-- Profile Text -->
                <div class="notification--list-body-text profile">
                    <h6>Messages</h6>
                </div>
            </a>
            <!-- Profile List Data -->
            <a class="profile-list--data" href="#">
                <!-- Profile icon -->
                <div class="profile--list-icon">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                </div>
                <!-- Profile Text -->
                <div class="notification--list-body-text profile">
                    <h6>Account settings</h6>
                </div>
            </a>
            <!-- Profile List Data -->
            <a class="profile-list--data" href="#">
                <!-- Profile icon -->
                <div class="profile--list-icon">
                    <i class="fa fa-life-ring" aria-hidden="true"></i>
                </div>
                <!-- Profile Text -->
                <div class="notification--list-body-text profile">
                    <h6>Support</h6>
                </div>
            </a>
            <!-- Profile List Data -->
            <a class="profile-list--data" href="#">
                <!-- Profile icon -->
                <div class="profile--list-icon">
                    <i class="fa fa-sign-out text-danger" aria-hidden="true"></i>
                </div>
                <!-- Profile Text -->
                <div class="notification--list-body-text profile">
                    <h6>Sign-out</h6>
                </div>
            </a>
        </div>
    </div>
</div>
</div>