<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between gap-4">
        <a href="{{ route('admin.dashboard') }}" class="logo">
            <span class="d-none d-lg-block">{{ get_option('site_name') }}</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
        <a class="btn btn-sm btn-success ml-4" target="_blank" href="{{ url('/') }}">
            <i class="bi bi-globe"></i>
            Go to Website
        </a>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->
            <li class="nav-item dropdown pe-3">
                <!-- End Profile Iamge Icon -->
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    @if(logged_user_info()->image)

                        <img src="{{ asset(logged_user_info()->image) }}" alt="Profile" class="rounded-circle">
                    @else
                        <img src="{{ asset('/admin/assets/img/profile-placeholder.png') }}" alt="Profile" class="rounded-circle">
                    @endif
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ logged_user_info()->name }}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ logged_user_info()->name }}</h6>
                        <span>{{ ucwords(logged_user_info()?->role?->name) }}</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}">
                            <i class="bi bi-person"></i>
                            <span>Account Setting</span>
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>

                        <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}"
                            onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>

                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header>
