<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kwanza images</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>

<body>

    <!-- loader -->
    <div class="loader-container">
        <main>
            <svg class="ip" viewBox="0 0 256 128" width="256px" height="128px" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="grad1" x1="0" y1="0" x2="1" y2="0">
                        <stop offset="0%" stop-color="#5ebd3e" />
                        <stop offset="33%" stop-color="#ffb900" />
                        <stop offset="67%" stop-color="#f78200" />
                        <stop offset="100%" stop-color="#e23838" />
                    </linearGradient>
                    <linearGradient id="grad2" x1="1" y1="0" x2="0" y2="0">
                        <stop offset="0%" stop-color="#e23838" />
                        <stop offset="33%" stop-color="#973999" />
                        <stop offset="67%" stop-color="#009cdf" />
                        <stop offset="100%" stop-color="#5ebd3e" />
                    </linearGradient>
                </defs>
                <g fill="none" stroke-linecap="round" stroke-width="16">
                    <g class="ip__track" stroke="#ddd">
                        <path d="M8,64s0-56,60-56,60,112,120,112,60-56,60-56" />
                        <path d="M248,64s0-56-60-56-60,112-120,112S8,64,8,64" />
                    </g>
                    <g stroke-dasharray="180 656">
                        <path class="ip__worm1" stroke="url(#grad1)" stroke-dashoffset="0"
                            d="M8,64s0-56,60-56,60,112,120,112,60-56,60-56" />
                        <path class="ip__worm2" stroke="url(#grad2)" stroke-dashoffset="358"
                            d="M248,64s0-56-60-56-60,112-120,112S8,64,8,64" />
                    </g>
                </g>
            </svg>
        </main>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo with circular corners, shadow, and continuous rotation -->
            <div class="d-flex align-items-center">
                <img src="{{ asset('assets/images/logo.jpg') }}" alt="Logo" class="rotating-logo"
                    style="width: 80px; height: 80px; margin: 10px; border-radius: 50%; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">

                <!-- Brand name with KWANZA on top and IMAGES below (will be next to logo on large screens) -->
                <div class="d-flex flex-column text-center" id="brand-name">
                    <a class="navbar-brand" href="{{ route('home') }}" style="margin: 0; line-height: 1;">KWANZA</a>
                    <p class="navbar-text"
                        style="margin: 0; color: rgb(103, 146, 210); font-family: 'Vladimir Script', cursive; font-size: 24px; line-height: 1;">
                        IMAGES</p>
                </div>
            </div>

            <!-- Navbar toggler for mobile view -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav" style="margin-left: 20px;">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blogs.index') }}">Kwanza News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gallery">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testimonials">Testimonials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Signin</a>
                </li>
            </ul>
        </div>
    </nav>


    @yield('content')
    <!-- Footer Section -->
    <section class="footer-section" style="background-color: #072D4B; padding: 20px 0;">
        <div class="container text-center text-light">


            <!-- Contact Details -->
            <p>Contact: <a href="tel:+254710487582" class="text-light">+254710487582</a> | Email: <a
                    href="mailto:kwanzaimages@gmail.com" class="text-light">KwanzaImages@gmail.com</a></p>


            <!-- Centered Logo and Social Media Icons -->
            <div id="social-container" class="d-flex justify-content-center align-items-center my-3">
                <!-- Logo -->
                <a href="#" class="mx-3">
                    <img src="{{ asset('assets/images/logo.jpg') }}" alt="Logo" style="height: 40px;"
                        class="img-fluid">
                </a>

                <!-- Facebook Icon -->
                <a href="https://www.facebook.com/profile.php?id=100085280299975&mibextid=ZbWKwL" class="mx-3">
                    <i class="fab fa-facebook text-primary" style="font-size: 24px;"></i>
                </a>

                <!-- Instagram Icon -->
                <a href="https://www.instagram.com/kwanzaimages?igsh=MTluNjF4b2tnb3QweA==" class="mx-3">
                    <i class="fab fa-instagram" style="font-size: 24px; color: #C13584;"></i>
                </a>
                <!-- YouTube Icon -->
                <a href="https://youtube.com/@kwanzashow?si=HKX2YSKTqYg_bfbE" class="mx-3">
                    <i class="fab fa-youtube" style="font-size: 24px; color: #FF0000;"></i>
                </a>

                <!-- Threads Icon (Custom Image) -->
                <a href="#" class="mx-3">
                    <img src="{{ asset('assets/images/threads.png') }}" alt="Threads" style="height: 24px;">
                </a>
                </a>

            </div>
            <p>&copy; 2024 Kwanza Images, Designed By Dijisoftwares Ict Hub.</p>
        </div>
    </section>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
