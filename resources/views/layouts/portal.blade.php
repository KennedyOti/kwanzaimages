<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ config('app.name', 'Kwanza Images Admin Portal') }}</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!------CDN ICNS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: [{{ asset('assets/css/fonts.min.css') }}],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}" />
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="{{ route('dashboard') }}" class="brand-link">
                {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
                <span class="brand-text font-weight-light"></span>
            </a>

            <div class="sidebar" data-background-color="dark">
                <div class="sidebar-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="{{ route('dashboard') }}" class="logo">
                            <img src="{{ asset('assets/images/logo.jpg') }}" alt="navbar brand" class="navbar-brand"
                                height="50" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <div class="sidebar-wrapper scrollbar scrollbar-inner">
                    <div class="sidebar-content">
                        <ul class="nav nav-secondary">
                            <li class="nav-item active">
                                <a data-bs-toggle="collapse" href="{{ route('dashboard') }}" class="collapsed"
                                    aria-expanded="false">
                                    <i class="fas fa-home"></i>
                                    <p>{{ ucwords(Auth::user()->role . ' Dashboard') }}</p>
                                    <span class="caret"></span>
                                </a>
                            </li>
                            <li class="nav-section">
                                <span class="sidebar-mini-icon">
                                    <i class="fa fa-ellipsis-h"></i>
                                </span>
                                <h4 class="text-section">Features</h4>
                            </li>
                            @switch(Auth::user()->role)
                                @case('admin')
                                    <li class="nav-item">
                                        <a data-bs-toggle="collapse" href="#base">
                                            <i class="fas fa-users"></i>
                                            <p>Users</p>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="base">
                                            <ul class="nav nav-collapse">
                                                <li>
                                                    <a href="{{ route('user.index') }}">
                                                        <span class="sub-item">Manage Users</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarLayouts">
                                            <i class="fas fa-handshake"></i>
                                            <p>Teams</p>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="sidebarLayouts">
                                            <ul class="nav nav-collapse">
                                                <li>
                                                    <a href="{{ route('teams.index') }}">
                                                        <span class="sub-item">Manage Teams</span>
                                                    </a>


                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarLayouts">
                                            <i class="fas fa-images"></i>
                                            <p>Gallery</p>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="sidebarLayouts">
                                            <ul class="nav nav-collapse">
                                                <li>
                                                    <a href="{{ route('gallery.index') }}">
                                                        <span class="sub-item">Manage Gallery</span>
                                                    </a>

                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a data-bs-toggle="collapse" href="#forms">
                                            <i class="fas fa-tools"></i>
                                            <p>Services</p>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="forms">
                                            <ul class="nav nav-collapse">
                                                <li>
                                                    <a href="{{ route('services.index') }}">
                                                        <span class="sub-item">Manage Services</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a data-bs-toggle="collapse" href="#tables">
                                            <i class="fas fa-calendar-check"></i>
                                            <p>Bookings</p>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="tables">
                                            <ul class="nav nav-collapse">
                                                <li>
                                                    <a href="{{ route('managebookings.index') }}">
                                                        <span class="sub-item">Manage Bookings</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a data-bs-toggle="collapse" href="#maps">
                                            <i class="fas fa-blog"></i>
                                            <p>Blogs</p>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="maps">
                                            <ul class="nav nav-collapse">
                                                <li>
                                                    <a href="{{ route('manageblog.index') }}">
                                                        <span class="sub-item">Manage Blogs</span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </li>

                                    <li class="nav-item">
                                        <a data-bs-toggle="collapse" href="#maps">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <p>Branches</p>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="maps">
                                            <ul class="nav nav-collapse">
                                                <li>
                                                    <a href="{{ route('branches.index') }}">
                                                        <span class="sub-item">Manage Branches</span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a data-bs-toggle="collapse" href="#charts">
                                            <i class="fas fa-shopping-cart"></i>

                                            <p>Sales</p>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="charts">
                                            <ul class="nav nav-collapse">
                                                <li>
                                                    <a href="{{ route('sales.create') }}">
                                                        <span class="sub-item">Record Sales</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('sales.index') }}">
                                                        <span class="sub-item">Manage Sales</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @break

                                @case('employee')
                                    <li class="nav-item">
                                        <a data-bs-toggle="collapse" href="#charts">
                                            <i class="far fa-chart-bar"></i>
                                            <p>Sales</p>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="charts">
                                            <ul class="nav nav-collapse">
                                                <li>
                                                    <a href="{{ route('sales.create') }}">
                                                        <span class="sub-item">Record Sales</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{ route('sales.index') }}">
                                                        <span class="sub-item">Manage Sales</span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </li>

                                    <li class="nav-item">
                                        <a data-bs-toggle="collapse" href="#maps">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <p>Blogs</p>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="maps">
                                            <ul class="nav nav-collapse">
                                                <li>
                                                    <a href="{{ route('manageblog.index') }}">
                                                        <span class="sub-item">Manage Blogs</span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </li>

                                    <li class="nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarLayouts">
                                            <i class="fas fa-th-list"></i>
                                            <p>Gallery</p>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="sidebarLayouts">
                                            <ul class="nav nav-collapse">
                                                <li>
                                                    <a href="{{ route('gallery.index') }}">
                                                        <span class="sub-item">Manage Gallery</span>
                                                    </a>

                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li class="nav-item">
                                        <a data-bs-toggle="collapse" href="#tables">
                                            <i class="fas fa-table"></i>
                                            <p>Bookings</p>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="tables">
                                            <ul class="nav nav-collapse">
                                                <li>
                                                    <a href="{{ route('managebookings.index') }}">
                                                        <span class="sub-item">Manage Bookings</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    @break

                                    @default
                                @endswitch
                            <li class="nav-item">

                                <div class="collapse" id="submenu">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a data-bs-toggle="collapse" href="#subnav1">
                                                <span class="sub-item">Level 1</span>
                                                <span class="caret"></span>
                                            </a>
                                            <div class="collapse" id="subnav1">
                                                <ul class="nav nav-collapse subnav">
                                                    <li>
                                                        <a href="#">
                                                            <span class="sub-item">Level 2</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="sub-item">Level 2</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <a data-bs-toggle="collapse" href="#subnav2">
                                                <span class="sub-item">Level 1</span>
                                                <span class="caret"></span>
                                            </a>
                                            <div class="collapse" id="subnav2">
                                                <ul class="nav nav-collapse subnav">
                                                    <li>
                                                        <a href="#">
                                                            <span class="sub-item">Level 2</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 1</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Sidebar -->

            <div class="main-panel">
                <div class="main-header">
                    <div class="main-header-logo">
                        <!-- Logo Header -->
                        <div class="logo-header" data-background-color="dark">
                            <a href="index.html" class="logo">
                                <img src="{{ asset('assets/images/logo.jpg') }}" alt="navbar brand"
                                    class="navbar-brand" height="20" />
                            </a>
                            <div class="nav-toggle">
                                <button class="btn btn-toggle toggle-sidebar">
                                    <i class="gg-menu-right"></i>
                                </button>
                                <button class="btn btn-toggle sidenav-toggler">
                                    <i class="gg-menu-left"></i>
                                </button>
                            </div>
                            <button class="topbar-toggler more">
                                <i class="gg-more-vertical-alt"></i>
                            </button>
                        </div>
                        <!-- End Logo Header -->
                    </div>
                    <!-- Navbar Header -->
                    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                        <div class="container-fluid">
                            <nav
                                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="submit" class="btn btn-search pe-1">
                                            <i class="fa fa-search search-icon"></i>
                                        </button>
                                    </div>
                                    <input type="text" placeholder="Search ..." class="form-control" />
                                </div>
                            </nav>

                            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                                <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                        role="button" aria-expanded="false" aria-haspopup="true">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-search animated fadeIn">
                                        <form class="navbar-left navbar-form nav-search">
                                            <div class="input-group">
                                                <input type="text" placeholder="Search ..."
                                                    class="form-control" />
                                            </div>
                                        </form>
                                    </ul>
                                </li>
                                <li class="nav-item topbar-icon dropdown hidden-caret">
                                    <a class="nav-link dropdown-toggle" href="#" id="messageDropdown"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                                <li class="nav-item topbar-icon dropdown hidden-caret">

                                    <ul class="dropdown-menu notif-box animated fadeIn"
                                        aria-labelledby="notifDropdown">
                                        <li>
                                            <div class="dropdown-title">
                                                You have 4 new notification
                                            </div>
                                        </li>
                                        <li>
                                            <div class="notif-scroll scrollbar-outer">
                                                <div class="notif-center">
                                                    <a href="#">
                                                        <div class="notif-icon notif-primary">
                                                            <i class="fa fa-user-plus"></i>
                                                        </div>
                                                        <div class="notif-content">
                                                            <span class="block"> New user registered </span>
                                                            <span class="time">5 minutes ago</span>
                                                        </div>
                                                    </a>
                                                    <a href="#">
                                                        <div class="notif-icon notif-success">
                                                            <i class="fa fa-comment"></i>
                                                        </div>
                                                        <div class="notif-content">
                                                            <span class="block">
                                                                Rahmad commented on Admin
                                                            </span>
                                                            <span class="time">12 minutes ago</span>
                                                        </div>
                                                    </a>
                                                    <a href="#">
                                                        <div class="notif-img">
                                                            <img src="assets/img/profile2.jpg" alt="Img Profile" />
                                                        </div>
                                                        <div class="notif-content">
                                                            <span class="block">
                                                                Reza send messages to you
                                                            </span>
                                                            <span class="time">12 minutes ago</span>
                                                        </div>
                                                    </a>
                                                    <a href="#">
                                                        <div class="notif-icon notif-danger">
                                                            <i class="fa fa-heart"></i>
                                                        </div>
                                                        <div class="notif-content">
                                                            <span class="block"> Farrah liked Admin </span>
                                                            <span class="time">17 minutes ago</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="see-all" href="javascript:void(0);">See all notifications<i
                                                    class="fa fa-angle-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item topbar-icon dropdown hidden-caret">
                                    <a class="nav-link" data-bs-toggle="dropdown" href="#"
                                        aria-expanded="false">
                                        <i class="fas fa-layer-group"></i>
                                    </a>
                                    <div class="dropdown-menu quick-actions animated fadeIn">
                                        <div class="quick-actions-header">
                                            <span class="title mb-1">Quick Actions</span>
                                            <span class="subtitle op-7">Shortcuts</span>
                                        </div>
                                        <div class="quick-actions-scroll scrollbar-outer">
                                            <div class="quick-actions-items">
                                                <div class="row m-0">
                                                    <a class="col-6 col-md-4 p-0" href="#">
                                                        <div class="quick-actions-item">
                                                            <div class="avatar-item bg-danger rounded-circle">
                                                                <i class="far fa-calendar-alt"></i>
                                                            </div>
                                                            <span class="text">Calendar</span>
                                                        </div>
                                                    </a>
                                                    <a class="col-6 col-md-4 p-0" href="#">
                                                        <div class="quick-actions-item">
                                                            <div class="avatar-item bg-warning rounded-circle">
                                                                <i class="fas fa-map"></i>
                                                            </div>
                                                            <span class="text">Maps</span>
                                                        </div>
                                                    </a>
                                                    <a class="col-6 col-md-4 p-0" href="#">
                                                        <div class="quick-actions-item">
                                                            <div class="avatar-item bg-info rounded-circle">
                                                                <i class="fas fa-file-excel"></i>
                                                            </div>
                                                            <span class="text">Reports</span>
                                                        </div>
                                                    </a>
                                                    <a class="col-6 col-md-4 p-0" href="#">
                                                        <div class="quick-actions-item">
                                                            <div class="avatar-item bg-success rounded-circle">
                                                                <i class="fas fa-envelope"></i>
                                                            </div>
                                                            <span class="text">Emails</span>
                                                        </div>
                                                    </a>
                                                    <a class="col-6 col-md-4 p-0" href="#">
                                                        <div class="quick-actions-item">
                                                            <div class="avatar-item bg-primary rounded-circle">
                                                                <i class="fas fa-file-invoice-dollar"></i>
                                                            </div>
                                                            <span class="text">Invoice</span>
                                                        </div>
                                                    </a>
                                                    <a class="col-6 col-md-4 p-0" href="#">
                                                        <div class="quick-actions-item">
                                                            <div class="avatar-item bg-secondary rounded-circle">
                                                                <i class="fas fa-credit-card"></i>
                                                            </div>
                                                            <span class="text">Payments</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item topbar-user dropdown hidden-caret">
                                    <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                                        aria-expanded="false">
                                        <div class="avatar-sm">
                                            <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                                                alt="Profile Picture" class="avatar-img rounded-circle" />

                                        </div>
                                        <span class="profile-username">
                                            <span class="op-7">Hi,</span>
                                            <span class="fw-bold">{{ Auth::user()->name }}</span>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                                        <div class="dropdown-user-scroll scrollbar-outer">
                                            <li>
                                                <div class="user-box">
                                                    <div class="avatar-lg">
                                                        <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                                                            alt="Profile Picture" class="avatar-img rounded-circle" />
                                                    </div>
                                                    <!---
                                                    <div class="u-text">
                                                        <h4>{{ Auth::user()->name }}</h4>
                                                        <p class="text-muted">{{ Auth::user()->email }}</p>
                                                        <a href="{{ route('profile.edit', Auth::user()->id) }}"
                                                            class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                                    </div>
                                                    --->
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dropdown-divider"></div>
                                                <!---
                                                                    <a class="dropdown-item" href="#">My Profile</a>
                                                                    <a class="dropdown-item" href="#">My Balance</a>--->
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item"
                                                    href="{{ route('profile.edit', Auth::user()->id) }}">Account
                                                    Setting</a>
                                                <div class="dropdown-divider"></div>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                                <a href="#" class="dropdown-item"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Logout') }}
                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- End Navbar -->
                </div>
                <div class="container">
                    @yield('content')
                </div>
                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-between">
                        <nav class="pull-left">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="http://www.dijisoftwares.com">
                                        Portal Developed by Dijisoftwares Ict Hub
                                    </a>
                                </li>

                            </ul>
                        </nav>
                        <div class="copyright">
                            2024, Kwanza Images Photography <i class="fa fa-heart heart text-danger"></i> by
                            <a href="http://www.dijisoftwares.com">Dijisoftwares Ict Hub</a>
                        </div>
                        <div>

                            <a target="_blank" href="https://dijisoftwares.com/">Kwanza Images Photography</a>.
                        </div>
                    </div>
                </footer>
            </div>

            <!-- Custom template | don't include it in your project! -->

            <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>
    <script>
        $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#177dff",
            fillColor: "rgba(23, 125, 255, 0.14)",
        });

        $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#f3545d",
            fillColor: "rgba(243, 84, 93, .14)",
        });

        $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#ffa534",
            fillColor: "rgba(255, 165, 52, .14)",
        });
    </script>
</body>

</html>
