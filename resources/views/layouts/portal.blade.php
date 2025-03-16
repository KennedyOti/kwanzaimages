<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Kwanza Images Admin Portal') }}</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <link rel="icon" href="{{ asset('assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap & FontAwesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Google Fonts -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">

    <!-- Custom CSS -->
    <style>
        /* Sidebar Styling */
        .main-sidebar {
            background: linear-gradient(135deg, #001f3f, #003366);
            color: white;
            transition: all 0.3s ease-in-out;
            width: 250px;
            position: fixed;
            height: 100vh;
            z-index: 1000;
        }

        .sidebar {
            height: 100%;
            overflow-y: auto;
        }

        .nav-item a {
            color: white;
            padding: 10px 15px;
            display: block;
        }

        .nav-item a:hover {
            background: #004aad;
            border-radius: 5px;
        }

        /* Navbar */
        .navbar {
            background: #004aad !important;
            padding-left: 260px;
        }

        /* Responsive Fix */
        @media (max-width: 992px) {
            .main-sidebar {
                display: none;
            }

            .navbar {
                padding-left: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <div class="sidebar">
                <div class="sidebar-logo text-center py-3">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('assets/images/logo.jpg') }}" alt="Kwanza Images Logo" class="img-fluid rounded-circle" width="70">
                    </a>
                </div>
                <div class="sidebar-wrapper scrollbar scrollbar-inner">
                    <ul class="nav nav-secondary" id="sidebarMenu">
                        <li class="nav-item active">
                            <a href="{{ route('dashboard') }}">
                                <i class="fas fa-home"></i>
                                <p>{{ ucwords(Auth::user()->role . ' Dashboard') }}</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <h4 class="text-section">Features</h4>
                        </li>
                        @switch(Auth::user()->role)
                        @case('admin')
                        <li class="nav-item"><a href="{{ route('user.index') }}"><i class="fas fa-users"></i> Manage Users</a></li>
                        <li class="nav-item"><a href="{{ route('teams.index') }}"><i class="fas fa-handshake"></i> Manage Teams</a></li>
                        <li class="nav-item"><a href="{{ route('gallery.index') }}"><i class="fas fa-images"></i> Manage Gallery</a></li>
                        <li class="nav-item"><a href="{{ route('services.index') }}"><i class="fas fa-tools"></i> Manage Services</a></li>
                        <li class="nav-item"><a href="{{ route('managebookings.index') }}"><i class="fas fa-calendar-check"></i> Manage Bookings</a></li>
                        <li class="nav-item"><a href="{{ route('manageblog.index') }}"><i class="fas fa-blog"></i> Manage Blogs</a></li>
                        <li class="nav-item"><a href="{{ route('branches.index') }}"><i class="fas fa-map-marker-alt"></i> Manage Branches</a></li>
                        <li class="nav-item"><a href="{{ route('sales.create') }}"><i class="fas fa-shopping-cart"></i> Record Sales</a></li>
                        <li class="nav-item"><a href="{{ route('sales.index') }}"><i class="fas fa-chart-bar"></i> Manage Sales</a></li>
                        @break
                        @case('employee')
                        <li class="nav-item"><a href="{{ route('sales.create') }}"><i class="fas fa-shopping-cart"></i> Record Sales</a></li>
                        <li class="nav-item"><a href="{{ route('manageblog.index') }}"><i class="fas fa-blog"></i> Manage Blogs</a></li>
                        <li class="nav-item"><a href="{{ route('gallery.index') }}"><i class="fas fa-images"></i> Manage Gallery</a></li>
                        <li class="nav-item"><a href="{{ route('managebookings.index') }}"><i class="fas fa-calendar-check"></i> Manage Bookings</a></li>
                        @break
                        @case('user')
                        @endswitch
                    </ul>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand text-white fw-bold" href="{{ route('dashboard') }}">Kwanza Admin</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav" id="mobileMenu"></ul>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <div class="container mt-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (window.innerWidth <= 992) {
                document.getElementById("mobileMenu").innerHTML = document.getElementById("sidebarMenu").innerHTML;
            }
        });
    </script>
</body>

</html>