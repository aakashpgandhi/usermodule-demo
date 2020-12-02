<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <div class="left-side-logo d-block d-lg-none">
        <div class="text-center">

            <a href="{{ route('home') }}" class="logo-admin">Vendors</a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
                <li class ="{{ Request::is('vendor-home') ? 'active' : '' }}">
                    <a href="{{ route('vendor-home') }}" class="waves-effect">
                        <i class="dripicons-meter"></i>
                        <span>Dashboard Vendor </span>
                    </a>
                </li>


            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
