<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Task Management</title>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('css/dataTables.responsive.css') }}" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="{{ asset('css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link href="{{ asset('css/utilities.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('frontend/en/img/fav-icon.png') }}">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link href="{{ asset('css/custom-admin.css') }}" rel="stylesheet">
    <style>
        #notification-append {
            height: auto;
            max-height: 300px;
            overflow-y: scroll;
            padding: 15px 15px 15px 15px;
        }

        #notification-append a.dropdown-item {
            padding: 0;
            color: #000;
            text-decoration: none;
        }

        #notification-append span {
            padding: 0;
            color: grey;
            text-decoration: none;
        }

        #notification-append hr:last-child {
            display: none;
        }

        .count-notification {
            background: #ffc107;
            border-radius: 24%;
            padding: 2px 4px;
            color: #000;
            font-weight: bold;
        }
    </style>
    @yield('styles')
</head>

<body style="overflow: hidden;">
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    Task Management
                </a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right" style="margin: 0">
                <!-- /.dropdown -->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Welcome {{ Auth::guard()->user()->name }}
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item adminbtnlayout" href="{{ route('adminPasswordPage') }}">Change
                            Password</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf </form>
                        <br>
                        <a class="dropdown-item adminbtnlayout" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        {{-- <br>
                    <a class="dropdown-item adminbtnlayout" href="{{ route('adminPasswordPage') }}">Change Password</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form> --}}
                    </div>
                </li>
                {{-- <li class="nav-item dropdown  notification-append">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-bell fa-2x"></i>
                        <small style="left: 37px;top: 3px;position: absolute;" class="count-notification">0</small>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" style="min-width: 260px; box-shadow: none"
                        aria-labelledby="navbarDropdown">
                        <div id="notification-append"></div>
                        <div class="text-center">
                            <a class="dropdown-item append-url" onclick="markAllAsRead()">Mark All as Read</a>
                        </div>
                    </div>
                </li> --}}
                @include('layouts.partials._admin-notification')
            </ul>
            @include('layouts.sidebar')
        </nav>
        <div id="page-wrapper" style="    overflow-y: scroll; height: 288px;">
            <div class="pt-10"> @include ('layouts.partials._notifications') @yield('content') @include('admin.copyright.copy') </div>
        </div>
        <div class="modal fade" id="imageViewModal" tabindex="-1" role="dialog"
            aria-labelledby="imageViewModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="" alt="" style="width:100%;height: auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="admin-loader" style="display: none;">
        <div class="loader"></div>
        <div class="order-export"
            style="display: none;position: absolute;transform: translate(50%, 50%);top: 64%;right: 48%;font-size: 20px;font-weight: 800;
    background: beige;    padding: 10px;">
            Processing Export
        </div>
    </div>
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script> --}}
    <script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script
        src="{{ asset('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}">
    </script> <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <!-- DataTables JavaScript -->
    <script src="{{ asset('js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/custom-admin.js') }}"></script>

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> --}}
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script> --}}

    <script>
        var routes = {
            deleteUser: "{{ route('deleteUser') }}",
            changeStatus: "{{ route('changeStatus') }}",
            vendorChangeStatus: "{{ route('vendorChangeStatus') }}",
            vendorChangeApproval: "{{ route('vendorChangeApproval') }}",
            merchantChangeUserType: "{{ route('merchantChangeUserType') }}",
            customerChangeStatus: "{{ route('customerChangeStatus') }}",
            deleteCustomer: "{{ route('deleteCustomer') }}",
            branchChangeStatus: "{{ route('branchChangeStatus') }}",
            getBranchCities: "{{ route('branchCities') }}",
            changeDistrictStatus: "{{ route('changeDistrictStatus') }}",
            changeBrandStatus: "{{ route('changeBrandStatus') }}",
            changeBrandApproval: "{{ route('changeBrandApproval') }}",
            changeCityStatus: "{{ route('changeCityStatus') }}",
            catLevel1ChangeStatus: "{{ route('catLevel1ChangeStatus') }}",
            catLevel1ChangeApproval: "{{ route('catLevel1ChangeApproval') }}",
            catLevel2ChangeStatus: "{{ route('catLevel2ChangeStatus') }}",
            catLevel2ChangeApproval: "{{ route('catLevel2ChangeApproval') }}",
            catLevel3ChangeStatus: "{{ route('catLevel3ChangeStatus') }}",
            catLevel3ChangeApproval: "{{ route('catLevel3ChangeApproval') }}",
            getCatLevel2for3cat3: "{{ route('getCatLevel2for3cat3') }}",
            catLevel4ChangeStatus: "{{ route('catLevel4ChangeStatus') }}",
            catLevel4ChangeApproval: "{{ route('catLevel4ChangeApproval') }}",
            getCatLevel1for2: "{{ route('getCatLevel1for2for3') }}",
            getCatLevel2for3: "{{ route('getCatLevel2for3') }}",
            requestedProductChangeStatus: "{{ route('requestedProductChangeStatus') }}",
            getCatLevel1for2Product: "{{ route('getCatLevel1for2for3Product') }}",
            getCatLevel2for3Product: "{{ route('getCatLevel2for3Product') }}",
            getCatLevel3for4Product: "{{ route('getCatLevel3for4Product') }}",
            productStockStatus: "{{ route('productStockStatus') }}",
            deleteProduct: "{{ route('deleteProduct') }}",
            deleteProductImage: "{{ route('deleteProductImage') }}",
            deleteFaq: "{{ route('deleteFaq') }}",
            deleteInquiry: "{{ route('deleteInquiry') }}",
            deleteProductInquiry: "{{ route('deleteProductInquiry') }}",
            deleteVendorInquiry: "{{ route('deleteVendorInquiry') }}",
            changeCouponStatus: "{{ route('changeCouponStatus') }}",
            getBranchReporting: "{{ route('getBranchReporting') }}",
            bannerChangeStatus: "{{ route('bannerChangeStatus') }}",
            changeTestimonialStatus: "{{ route('admin.testimonials.changeTestimonialStatus') }}",
            changeMerchantUserStatus: "{{ route('changeMerchantUserStatus') }}",
            bannerDelete: "{{ route('bannerDelete') }}",
            getMerchantProForBanner: "{{ route('getMerchantProForBanner') }}",
            customerChangePremium: "{{ route('premiumCustomer') }}",
            deleteReview: "{{ route('deleteReview') }}",
        };

        $('.thumbnail-image-150').on('click', function(event) {
            console.log($(event)[0].currentTarget.src);
            $('#imageViewModal img').attr('src', $(event)[0].currentTarget.src);
            $('#imageViewModal').modal('show');
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true,
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            function dismiss_alerts() {
                window.setTimeout(function() {
                    $(".alert").fadeTo(2500, 0).slideUp(500, function() {
                        $(this).remove();
                    });
                }, 3000);
            }

            $(document).ready(function() {
                // dismiss_alerts();
            });
        });
        var date = new Date();
        date.setDate(date.getDate() - 1);
        $('#daterange').daterangepicker({
            autoApply: true,
            minDate: new Date()
        });

        if ($("div.date.time, input.date.time").length > 0) {
            $(function() {
                $("div.date.time, input.date.time").datetimepicker({
                    format: 'LT'
                });
            });
        }

        if ($("div.date.next, input.date.next").length > 0) {
            $(function() {
                $("div.date.next, input.date.next").datetimepicker({
                    // format: 'L'
                    format: 'DD-MM-YYYY',
                    minDate: date,
                });
            });
        }

        if ($("div.date, input.date").length > 0) {
            $(function() {
                $("div.date , input.date").datetimepicker({
                    format: 'DD-MM-YYYY',
                });
            });
        }

        if ($("div.datetimeC, input.datetimeC").length > 0) {
            $(function() {
                $("div.datetimeC, input.datetimeC").datetimepicker({
                    format: 'DD-MM-YYYY H:m:s',
                    minDate: date,
                });
            });
        }
    </script>
    <script>
        // $(document).ready(function() {
        //     getNotifications();

        //     function getNotifications() {
        //         var url = "{{ route('getNotifications') }}";
        //         $.ajax({
        //             type: 'GET',
        //             url: url,
        //             success: function(response, status) {
        //                 console.log(response);
        //                 if (response.result == 'success') {
        //                     $('.count-notification').text(response.data.length);

        //                     let my_html = '';
        //                     if (response.data.length !== 0) {
        //                         $.each(response.data, function(key, value) {
        //                             if (value.type == 1) {
        //                                 var url = "{{ route('customerNotification', ':id') }}";
        //                                 url = url.replace(':id', value.id);
        //                             }
        //                             // else if (value.type == 2) {
        //                             //     var url = "{{ route('merchantNotification', ':id') }}";
        //                             //     url = url.replace(':id', value.id);
        //                             // }else if (value.type == 4) {
        //                             //     var url = "{{ route('reviewNotification', ':id') }}";
        //                             //     url = url.replace(':id', value.id);
        //                             // }
        //                             else if (value.type == 0) {
        //                                 var url = "{{ route('orderNotification', ':id') }}";
        //                                 url = url.replace(':id', value.id);
        //                             }
        //                             my_html += '<a class="dropdown-item append-url"  href="' +
        //                                 url + '">' + value.content + '</a><hr>';
        //                         });
        //                     } else {
        //                         my_html += '<span>No Notification</span>';
        //                     }
        //                     // if (response.data.length !== 0) {
        //                     $('#notification-append').html(my_html);
        //                     // }
        //                 }
        //                 if (response.result == 'error') {}
        //             },
        //         });
        //         setTimeout(function() {
        //             // getNotifications();
        //         }, 5000);
        //     }
        // });

        // function markAllAsRead() {
        //     $.ajax({
        //         method: "POST",
        //         url: '{{ route('markAllAsRead') }}',
        //         data: {
        //             _token: '{{ csrf_token() }}',
        //         },
        //         success: function(response) {
        //             if (response.status == 1) {
        //                 getNotifications();
        //             }
        //         }
        //     });
        // }
    </script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('input', function() {
                $('input[name="buyQty"]').mask('000000000');
            });
        });
    </script>
    @yield('script')
</body>

</html>
