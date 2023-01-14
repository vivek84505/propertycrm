<div class="side-menu-area">

<div class="classy-nav-container breakpoint-off">
    <!-- Classy Menu -->
    <nav class="classy-navbar justify-content-between" id="classyNav">

        <!-- Navbar Toggler -->
        <div class="classy-navbar-toggler">
            <span class="navbarToggler"><span></span><span></span><span></span></span>
        </div>

        <!-- Menu -->
        <div class="classy-menu">
            <!-- close btn -->
            <div class="classycloseIcon">
                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
            </div>

            <!-- Nav Start -->
            <div class="classynav">
                <ul>
                    <li><a href="#"><i class="icon_drive"></i> Master</a>
                        <ul class="dropdown">
                            <li><a href="{{route('leadsource')}}">Lead Source master</a></li>                            
                            <li><a href="{{route('leadstatus')}}">Lead Status master</a></li>                            
                        </ul>
                    </li>
                    
                    
                    <li><a href="{{route('dashboard')}}"><i class="icon_genius"></i> Dashboard </a></li>
                    <li><a href="{{route('users')}}"><i class="icon_genius"></i> Users Management </a></li>
                    <li><a href="{{route('customers')}}"><i class="icon_genius"></i> Customers </a></li>

                    
                </ul>
            </div>
            <!-- Nav End -->
        </div>
    </nav>
</div>
</div>
