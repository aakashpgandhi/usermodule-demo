<div class="topbar">

    <div class="topbar-left	d-none d-lg-block">
        <div class="text-center">

            <!-- <a href="{{ route('home') }}" class="logo"><img src="{{ asset('admin/images/logo.jpg') }}" height="80" alt="logo"></a> -->
            <a href="{{ route('home') }}" class="logo-admin">Vendors</a>
        </div>
    </div>

    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    @if (isset(Auth::guard('admin')->user()->vendor_avatar))
                        <img src="{{ Auth::guard('admin')->user()->vendor_avatar }}" alt="user" class="rounded-circle">
                    @else
                        <img src="{{ asset('admin/images/users/user-1.jpg') }}" alt="user" class="rounded-circle">
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">

                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                            class="mdi mdi-logout m-r-5"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="list-inline-item">
                <button type="button" class="button-menu-mobile open-left waves-effect">
                    <i class="ion-navicon"></i>
                </button>
            </li>
        </ul>

        <div class="clearfix"></div>

    </nav>

</div>
