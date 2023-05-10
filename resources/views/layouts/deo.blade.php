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
    <title>Carton Data Entry Operator Panel</title>
    <link href="{{asset('public/css/custom.css')}}" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="{{asset('public/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="{{asset('public/css/dataTables.responsive.css')}}" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="{{asset('public/css/metisMenu.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" />
    <link rel="stylesheet"
    href="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" />
    <link href="{{asset('public/css/utilities.css')}}" rel="stylesheet">
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link href="{{asset('public/css/sb-admin-2.min.css')}}" rel="stylesheet">
       <link rel="shortcut icon" href="{{ asset('public/frontend/en/img/favicon.png') }}">
    <link href="{{asset('public/css/custom-admin.css')}}" rel="stylesheet">
    @yield('css')

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header"> <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <img src="{{ asset('resources/assets/images/logo.png') }}" width="130px;"
                    style="float: left; margin: 5px 0 0 10px;"><a class="navbar-brand"
                    href="{{ route('deoDashboard') }}">Carton Data Entry Operator Panel</a> </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right" style="margin: 0">
                <!-- /.dropdown -->
                <li class="nav-item dropdown"> <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Welcome {{ Auth::guard('dataEntryOperator')->user()->name }}
                        <span class="caret"></span> </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> <a
                            class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }} </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf </form>
                    </div>
                </li>
            </ul> <!-- /.navbar-top-links --> @include('layouts.deo-sidebar')
        </nav>
        <div id="page-wrapper">
            <div class="pt-10"> @include ('layouts.partials._notifications') @yield('content') </div>
        </div>
    </div> {{-- bower components --}}


    <script type="text/javascript"
        src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> --}}

    <script type="text/javascript" src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <script type="text/javascript"
        src="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}">
    </script> <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('public/js/sb-admin-2.min.js')}}"></script>
    <!-- DataTables JavaScript -->
    <script src="{{asset('public/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('public/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('public/js/dataTables.responsive.js')}}"></script>
    <script src="{{asset('public/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/daterangepicker.js')}}"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="{{asset('bower_components/bootstrap/dist/js/bootstrap-multiselect.js')}}"></script>

    <script>
        var routes = {
            changeMerchantUserStatus: "{{ route('changeMerchantUserStatus') }}",
            deleteMerchantUser: "{{ route('deleteMerchantUser') }}",
            getDistrict: "{{ route('getDistrict') }}",
            getCity: "{{ route('getCity') }}",
            deleteMerchnatInquiry: "{{ route('deleteMerchnatInquiry') }}",

            getCat2forMerchantProduct: "{{ route('getCat2forMerchantProduct') }}",
            getCat3forMerchantProduct: "{{ route('getCat3forMerchantProduct') }}",
            getCat4forMerchantProduct: "{{ route('getCat4forMerchantProduct') }}",
            changeOrderDiscountStatus: "{{ route('changeOrderDiscountStatus') }}",
            deleteRequestedProductImage: "{{ route('deleteRequestedProductImage') }}",
            getProductDetailForMerchantProduct: "{{ route('getProductDetailForMerchantProduct') }}",
            deleteProductDEO: "{{ route('deleteProductDEO') }}",
            getNonAddedBranches: "{{ route('getNonAddedBranches') }}",
            getNonAddedProducts: "{{ route('getNonAddedProducts') }}",
        };

    </script>

    <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true,
            });
        });

    </script>
    <script>
        $(document).ready(function () {
            function dismiss_alerts() {
                window.setTimeout(function () {
                    $(".alert").fadeTo(2500, 0).slideUp(500, function () {
                        $(this).remove();
                    });
                }, 3000);
            }
            $(document).ready(function () {
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
            $(function () {
                $("div.date.time, input.date.time").datetimepicker({
                    format: 'LT'
                });
            });
        }

        if ($("div.date.next, input.date.next").length > 0) {
            $(function () {
                $("div.date.next, input.date.next").datetimepicker({
                    // format: 'L'
                    format: 'DD-MM-YYYY',
                    minDate: date,
                });
            });
        }

        if ($("div.date, input.date").length > 0) {
            $(function () {
                $("div.date , input.date").datetimepicker({
                    format: 'DD-MM-YYYY',
                });
            });
        }

    </script>
<script type="text/javascript" src="{{ asset('js/common.js')}}"></script>
    @yield('script')
</body>

</html>
