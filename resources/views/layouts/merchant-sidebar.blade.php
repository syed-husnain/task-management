<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            <li>
                <a href="{{  route('merchantDashboard') }}"><i class="fa fa-tachometer-alt  fa-fw"></i> Dashboard </a>
            </li>

            <li>
                <a href="#"><i class="fa fa-user fa-fw"></i> Manage Profile<span
                        class="fa fa-angle-right pull-right"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('viewMerchantProfile') }}">View Profile</a>
                    </li>
                    <li>
                        <a href="{{ route('editMerchantProfile') }}">Update Profile</a>
                    </li>
                </ul>
            </li>
            {{--@if(Auth('merchant')->user()->user_type == 0)
            <li>
                <a href="#"><i class="fa fa-user fa-fw"></i> Manage Users <span
                        class="fa fa-angle-right pull-right"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('merchantCreateUser') }}">Add User</a>
                    </li>
                    <li>
                        <a href="{{ route('merchantListUsers') }}">List Users</a>
                    </li>
                </ul>
            </li>
            @endif--}}



            <li>
                <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Manage Orders <span
                        class="fa fa-angle-right pull-right"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('merchantCreateOrder') }}">Add New</a>
                    </li>
                    <li>
                        <a href="{{ route('merchantListOrders') }}">List Orders</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-shopping-basket fa-fw"></i> Assigned Products<span
                        class="fa fa-angle-right pull-right"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('busAssignedProducts') }}">List Products</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-undo fa-fw"></i> Manage Return Products<span
                        class="fa fa-angle-right pull-right"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('getReturnProducts') }}">Add Returns</a>
                    </li>
                    <li>
                        <a href="{{ route('busReturnProducts') }}">List Returns</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fas fa-trash fa-fw"></i> Manage Waste Products<span
                        class="fa fa-angle-right pull-right"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('getWasteProducts') }}">Add Waste</a>
                    </li>
                    <li>
                        <a href="{{ route('busWasteProducts') }}">List Waste</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
