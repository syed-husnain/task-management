<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <li>
                    <a href="{{  route('deoDashboard') }}"><i class="fa fa-tachometer-alt  fa-fw"></i> Dashboard </a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-list-alt fa-fw"></i> Manage Product Group <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('deoProductGroup') }}">List Product Groups</a>
                        </li>
                        <li>
                            <a href="{{ route('deoProductGroupCreate') }}">Create Product Groups</a>
                        </li>
                    </ul>
                </li>    

                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Manage Products<span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('deoCreateProduct') }}">Add Products</a>
                        </li>
                        <li>
                            <a href="{{ route('deoListProduct') }}">View Products</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Manage Requested Products<span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('deoCreateRequestedProduct') }}">Add Requested Products</a>
                        </li>
                        <li>
                            <a href="{{ route('deoListRequestedProduct') }}">View Requested Products</a>
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
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Manage Import Products<span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('import') }}">Bulk Import Products</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
