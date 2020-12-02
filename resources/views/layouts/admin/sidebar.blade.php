<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <div class="left-side-logo d-block d-lg-none">
        <div class="text-center">
            <!-- <a href="javascript:void(0)" class="logo"><img src="{{ asset('admin/images/logo.png') }}" alt="logo"></a> -->
            <a href="{{ route('home') }}" class="logo-admin">Vendors</a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
                <li class ="{{ Request::is('admin/home') ? 'active' : '' }}">
                    <a href="{{ route('admin-home') }}" class="waves-effect">
                        <i class="dripicons-meter"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class ="{{ Request::is('admin/vendor*') ? 'active' : '' }}">
                    <a href="{{ route('admin.vendor.index') }}" class="waves-effect">
                        <i class="fa fa-shopping-basket"></i>
                        <span>Vendors</span>
                    </a>
                </li>



            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
