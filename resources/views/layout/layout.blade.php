<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Movie Booking</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}" type='text/css' />
    <link rel="stylesheet" href="{{asset('vendors/iconfonts/puse-icons-feather/feather.css')}}" type='text/css' />
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}" type='text/css' />
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.addons.css')}}" type='text/css' />

    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{asset('vendors/iconfonts/font-awesome/css/font-awesome.min.css')}}" type='text/css' />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type='text/css' />
    <!-- endinject -->
    <link rel="shortcut icon"  href="{{asset('images/favicon.png')}}" type='text/css' />

        @yield('css')

</head>

<body>



<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row navbar-success">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="adminhome.html">
                <img src="images/movie/homeicon.jpg" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="adminhome.html">
                <img src="images/movie/homeicon.jpg" alt="logo" />
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link">
                        <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                    </a>
                </li>
                <li class="nav-item">

                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-profile" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <img src="images/faces/face1.jpg" alt="image">
                        <span class="d-none d-lg-inline">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                    </a>
                    <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/logout') }}">
                            <i class="mdi mdi-logout mr-2 text-primary"></i>
                            Signout
                        </a>
                    </div>
                </li>

            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->


        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <div class="nav-link d-flex">
                        <div class="profile-image">
                            <!-- <img src="images/faces/face1.jpg" alt="image" />
                            <span class="online-status online"></span> -->
                            <!--change class online to offline or busy as needed-->
                        </div>
                        <div class="profile-name">
                            <p class="name">
                                {{\Illuminate\Support\Facades\Auth::user()->name}}
                            </p>

                        </div>
                    </div>
                </li>
                <li class="nav-item nav-category">
                    <span class="nav-link">Menu</span>
                </li>
                @if(\Illuminate\Support\Facades\Auth::user()->user_type_id == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin-home')}}">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Dashboard</span>

                        </a>
                    </li>
                @elseif(\Illuminate\Support\Facades\Auth::user()->user_type_id == 2)
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Home</span>

                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/purchase-history')}}">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Purchase History</span>

                        </a>
                    </li>

                @endif


            </ul>
        </nav>




        @yield('content')


    </div>
    <!-- page-body-wrapper ends -->
</div>


<!-- plugins:js -->


            <!-- plugins:js -->
    <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('js/off-canvas.js')}}"></script>
    <script src="{{asset('js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('js/misc.js')}}"></script>
    <script src="{{asset('js/settings.js')}}"></script>
    <script src="{{asset('js/todolist.js')}}"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>


@yield('js')


</body>

</html>
