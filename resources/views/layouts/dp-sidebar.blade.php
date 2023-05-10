<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <li>
                    <a href="{{  route('dpDashboard') }}"><i class="fa fa-tachometer-alt  fa-fw"></i> Dashboard </a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Manage Orders<span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('dpOrders') }}">View Orders</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
