<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse" style="overflow-y: scroll; height: 600px;">
        <ul class="nav" id="side-menu">

            <li>
                <a href="{{  route('dashboard') }}"><i class="fa fa-tachometer-alt  fa-fw"></i> Dashboard </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-user fa-fw"></i>Manage Tasks <span
                        class="fa fa-angle-right pull-right"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('tasks.create') }}">Add New</a>
                    </li>
                    <li>
                        <a href="{{ route('tasks.index') }}">List Tasks</a>
                    </li>
                </ul>
            </li>
            @if(Auth::user()->hasPermission('manage-admin-users'))
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i>Manage Admin Users <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('createUser') }}">Add Admin User</a>
                        </li>
                        <li>
                            <a href="{{ route('listUsers') }}">List Admin Users</a>
                        </li>
                    </ul>
                </li>
            @endif

          {{--  @if(Auth::user()->hasPermission('manage-admin-users'))
                <li>
                    <a href="#"><i class="fa fa-history fa-fw"></i> Manage Admin Logs <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('admin.activity_log.index') }}">List Logs</a>
                        </li>
                    </ul>
                </li>
            @endif--}}

            @if(Auth::user()->hasPermission('manage-customers'))
                <li>
                    <a href="#"><i class="fa fa-users fa-fw"></i> Manage Customers <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                    <!--                        <li>
                            <a href="{{ route('listCustomers') }}">List Business Customers</a>
                        </li>-->
                        <li>
                            <a href="{{ route('listIndividualCustomers') }}">List Customers</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(Auth::user()->hasPermission('manage-districts'))
                {{-- <li>
                    <a href="#"><i class="fas fa-globe fa-fw"></i> Manage Regions <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('createDistrict') }}">Add Region</a>
                        </li>
                        <li>
                            <a href="{{ route('listDistricts') }}">List Regions</a>
                        </li>
                    </ul>
                </li> --}}
            @endif

            @if(Auth::user()->hasPermission('manage-cities'))
                {{-- <li>
                    <a href="#"><i class="fas fa-city fa-fw"></i> Manage Cities <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('createCity') }}">Add City</a>
                        </li>
                        <li>
                            <a href="{{ route('listCities') }}">List Cities</a>
                        </li>
                    </ul>
                </li> --}}
            @endif

            @if(Auth::user()->hasPermission('manage-products-categories'))
                <li>
                    <a href="#"><i class="fa fa-list-alt fa-fw"></i> Categories Level 1 <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('createCategoryLevel1') }}">Add Category Level 1</a>
                        </li>
                        <li>
                            <a href="{{ route('listCategoriesLevel1') }}">List Categories Level 1</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-list-alt fa-fw"></i> Categories Level 2 <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('createCategoryLevel2') }}">Add Category Level 2</a>
                        </li>
                        <li>
                            <a href="{{ route('listCategoriesLevel2') }}">List Categories Level 2</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-list-alt fa-fw"></i> Categories Level 3 <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('createCategoryLevel3') }}">Add Category Level 3</a>
                        </li>
                        <li>
                            <a href="{{ route('listCategoriesLevel3') }}">List Categories Level 3</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-list-alt fa-fw"></i> Categories Level 4 <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('createCategoryLevel4') }}">Add Category Level 4</a>
                        </li>
                        <li>
                            <a href="{{ route('listCategoriesLevel4') }}">List Categories Level 4</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(Auth::user()->hasPermission('manage-products'))
                <li>
                    <a href="#"><i class="fa fa-list fa-fw"></i> Manage Products <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('createProduct') }}">Add Product</a>
                        </li>
                        <li>
                            <a href="{{ route('listProducts') }}">List Products</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.ledger-log.create') }}">Daily Stock Update</a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('admin.mostViewProduct') }}">List Most Viewed Products</a>
                        </li> --}}
                    </ul>
                </li>
            @endif

            @if(Auth::user()->hasPermission('manage-vendors'))
                <li>
                    <a href="#">
                        <i class="fa fa-bus fa-fw"></i> Manage Buses
                        <span class="fa fa-angle-right pull-right"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('add.bus') }}">Add Bus</a>
                        </li>
                        <li>
                            <a href="{{ route('listBuses') }}">List Buses</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if(Auth::user()->hasPermission('manage-bus-drivers'))

                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Manage Bus Drivers <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('add.driver') }}">Add Driver</a>
                        </li>
                        <li>
                            <a href="{{ route('listDrivers') }}">List Drivers</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if(Auth::user()->hasPermission('manage-bus-routes'))
                <li>
                    <a href="#"><i class="fa fa-route fa-fw"></i> Manage Bus Routes <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('add.route') }}">Add Route</a>
                        </li>
                        <li>
                            <a href="{{ route('listRoutes') }}">List Routes</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if(Auth::user()->hasPermission('manage-bus-products'))

                <li>
                    <a href="#"><i class="fa fa-list-alt fa-fw"></i> Manage Bus Products <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        {{-- <li>
                            <a href="{{ route('adminBuses.product.create') }}">Add Products</a>
                        </li> --}}
                        <li>
                            <a href="{{ route('admin.daily-stock.index') }}">Daily Stock Issuance</a>
                        </li>

                        <li>
                            <a href="{{ route('adminBusesListProducts') }}">List Products</a>
                        </li>

                    </ul>
                </li>
            @endif
            <li>
                <a href="#"><i class="fa fa-list-alt fa-fw"></i> Manage Bus Returns <span
                        class="fa fa-angle-right pull-right"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.daily-return.index') }}">Daily Returns</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.daily-return.list') }}">List Returns</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-list-alt fa-fw"></i> Manage Bus Waste <span
                        class="fa fa-angle-right pull-right"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.daily-waste.index') }}">Daily Waste</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.daily-waste.list') }}">List Waste</a>
                    </li>
                </ul>
            </li>
            @if(Auth::user()->hasPermission('manage-orders'))
                <li>
                    <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Manage Orders <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('listOrders') }}">List Orders</a>
                        </li>
                    </ul>
                </li>
            @endif

        <li class="pb-50">
            <a href="#"><i class="fas fa-newspaper fa-fw"></i> Miscellaneous <span class="fa fa-angle-right pull-right"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="#"><i class="fa fa-arrow-right fa-fw"></i> Manage Menus <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-third-level">
                        {{-- <li>
                            <a href="{{ route('menus.create') }}">Add Menu</a>
                        </li> --}}
                        <li>
                            <a href="{{ route('menus.index') }}">List Menu</a>
                        </li>
                    </ul>
                </li>
                @if(Auth::user()->hasPermission('manage-sliders'))
                    <li>
                        <a href="#"><i class="fa fa-arrow-right fa-fw"></i> Manage Banners <span
                                class="fa fa-angle-right pull-right"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="{{ route('createBanner') }}">Add Banner</a>
                            </li>
                            <li>
                                <a href="{{ route('listBanners') }}">List Banners</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->hasPermission('manage-cms-pages'))
                    <li>
                        <a href="#"><i class="fa fa-arrow-right fa-fw"></i> Manage CMS Pages<span
                                class="fa fa-angle-right pull-right"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="{{route('listCMSPages')}}">List CMS Pages</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->hasPermission('manage-inquiries'))
                    <li>
                        <a href="#"><i class="fa fa-arrow-right fa-fw"></i> Manage Inquiries <span
                                class="fa fa-angle-right pull-right"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="{{ route('listInquiries') }}">List Inquiries</a>
                            </li>
                            <!--<li>
                                <a href="{{ route('vendorInquiries') }}">Vendor Inquiries</a>
                            </li>
                            <li>
                                <a href="{{ route('productInquiry') }}">Product Inquiries</a>
                            </li>-->
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->hasPermission('manage-faqs'))
                    <li>
                        <a href="#"><i class="fa fa-arrow-right fa-fw"></i> Manage FAQ's <span
                                class="fa fa-angle-right pull-right"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="{{ route('createFAQs') }}">Add FAQ's</a>
                            </li>
                            <li>
                                <a href="{{ route('listFAQs') }}">List FAQ's</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->hasPermission('manage-brands'))
                    <li>
                        <a href="#"><i class="fa fa-arrow-right fa-fw"></i> Manage Partners <span
                                class="fa fa-angle-right pull-right"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="{{ route('createBrand') }}">Add Partner</a>
                            </li>
                            <li>
                                <a href="{{ route('listBrands') }}">List Partners</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->hasPermission('manage-reviews'))
                    <li>
                        <a href="#"><i class="fa fa-arrow-right fa-fw"></i> Manage Reviews <span
                                class="fa fa-angle-right pull-right"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="{{ route('listReviews') }}">List Reviews</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->hasPermission('manage-subscribers'))
                    <li>
                        <a href="#"><i class="fa fa-arrow-right fa-fw"></i> Manage Subscribers <span
                                class="fa fa-angle-right pull-right"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="{{ route('listSubscribers') }}">List Subscribers</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->hasPermission('manage-notifications'))
                     <li>
                        <a href="#"><i class="fa fa-arrow-right fa-fw"></i> Manage Notifications <span
                                class="fa fa-angle-right pull-right"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="{{ route('listNotifications') }}">List Notifications</a>
                            </li>
                            <li>
                                <a href="{{ route('sendNotifications') }}">Send Notifications</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->hasPermission('manage-testimonials'))
                    <li>
                        <a href="#">
                            <i class="fa fa-arrow-right fa-fw"></i>
                            Manage Testimonials
                            <span class="fa fa-angle-right pull-right"></span>
                        </a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="{{ route('admin.testimonials.create') }}">Add Testimonial</a>
                                <a href="{{ route('admin.testimonials.index') }}">List Testimonial</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->hasPermission('manage-configuration'))
                    <li>
                        <a href="#"><i class="fa fa-arrow-right fa-fw"></i>Manage Configurations<span
                                class="fa fa-angle-right pull-right"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="{{route('admin.config')}}">Edit</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </li>

          {{--  @if(Auth::user()->hasPermission('manage-delivery-person'))
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Manage Delivery Person <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('admin.delivery-person.index') }}">List Delivery Person</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(Auth::user()->hasPermission('manage-requested-products'))
                <li>
                    <a href="#"><i class="fa fa-list-alt fa-fw"></i> Manage Request Products <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('listRequestProducts') }}">List Request Products</a>
                        </li>
                        <li>
                            <a href="{{ route('customer-product-request') }}">List Customer Product Requests</a>
                        </li>
                    </ul>
                </li>
            @endif--}}

            {{-- <li>
                 <a href="#"><i class="fa fa-list-alt fa-fw"></i> Import Categories <span
                         class="fa fa-angle-right pull-right"></span></a>
                 <ul class="nav nav-second-level">
                     <li>
                         <a href="{{ route('catImport') }}">Import Categories</a>
                     </li>
                 </ul>
             </li>--}}

            {{--<li>
                <a href="#"><i class="fas fa-newspaper fa-fw"></i> Manage Districts Queries <span
                        class="fa fa-angle-right pull-right"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('listDistrictsQuery') }}">List Districts Queries</a>
                    </li>
                </ul>
            </li>--}}

           {{-- @if(Auth::user()->hasPermission('manage-blogs'))
                <li>
                    <a href="#"><i class="fa fa-image fa-fw"></i> Manage Blogs <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('blog.create') }}">Add Blogs</a>
                        </li>
                        <li>
                            <a href="{{ route('blog.index') }}">List Blogs</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(Auth::user()->hasPermission('manage-branches'))
                <li>
                    <a href="#"><i class="fa fa-list-alt fa-fw"></i> Manage Branches <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('listBranches') }}">List Branches</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(Auth::user()->hasPermission('manage-discounts'))
                <li>
                    <a href="#"><i class="fas fa-newspaper fa-fw"></i> Manage Coupons <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('createCoupon') }}">Add Coupon</a>
                        </li>
                        <li>
                            <a href="{{ route('listCoupons') }}">List Coupons</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(Auth::user()->hasPermission('manage-notifications'))
                <li>
                    <a href="#"><i class="fas fa-newspaper fa-fw"></i> Manage Notifications <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('listNotifications') }}">List Notifications</a>
                        </li>
                        <li>
                            <a href="{{ route('sendNotifications') }}">Send Notifications</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(Auth::user()->hasPermission('manage-feedbacks'))
                <li>
                    <a href="#"><i class="fas fa-newspaper fa-fw"></i> Manage Feedbacks <span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('listFeedback') }}">List Feedbacks</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(Auth::user()->hasPermission('manage-reports'))
                <li>
                    <a href="#"><i class="far fa-chart-bar fa-fw"></i> Manage Reports<span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('report.orders')}}">Order Reports</a>
                        </li>
                    <!--                        <li>
                            <a href="{{route('reports.merchant')}}">Merchant Reports</a>
                        </li>-->
                        <li>
                            <a href="{{route('product-reports')}}">Most Viewed Products Report</a>
                        </li>
                        <li>
                            <a href="{{route('productReports')}}">Top Selling Products Reports</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(Auth::user()->hasPermission('manage-tax'))
                <li>
                    <a href="#"><i class="far fa-chart-bar fa-fw"></i> Manage Tax Percentage<span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('adminTaxEdit')}}">Update Tax Percentage</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(Auth::user()->hasPermission('manage-tax'))
                <li>
                    <a href="#"><i class="far fa-chart-bar fa-fw"></i> Manage Clearance Sale<span
                            class="fa fa-angle-right pull-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('adminClearanceEdit')}}">Update Clearance Sale</a>
                        </li>
                    </ul>
                </li>
            @endif--}}

        </ul>
    </div>
</div>
