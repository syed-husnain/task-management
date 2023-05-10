<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <li>
                    <a href="{{  route('daDashboard') }}"><i class="fa fa-tachometer-alt  fa-fw"></i> Dashboard </a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Manage Users<span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('daListDEOUser') }}">View Data Entry Operator</a>
                        </li>
                        <li>
                            <a href="{{ route('daListDPUser') }}">View Delivery Persons</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Manage Products<span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('daProduct') }}">View Products</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Manage Requested Products<span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('daRequestedProduct') }}">View Requested Products</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Manage Orders<span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('daOrder') }}">View Orders</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
