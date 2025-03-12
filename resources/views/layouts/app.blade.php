<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="m_gTdDMrO9ubkJXM-kQ0AN4YaqhUVEk72-kzgYlKNkI" />
    <meta property="og:site_name"
        content="Kwanza Images Studio - Your premier photography and videography studio in Njoro Town, Kenya." />
    <meta property="og:title" content="Home - KWANZA IMAGES" />

    <meta name="description"
        content="Discover Kwanza Images Studio, your premier photography and videography studio in Njoro Town, Nakuru County, Kenya. We specialize in studio 
        photography, outdoor shoots, wedding and event coverage, and creative videography. Capture your cherished moments with Kwanza Images!" />

    <meta name="keywords"
        content="Studio Photography in Njoro, Videography in Njoro, Wedding Photography Nakuru, Event Photography Kenya, Studio Photography Njoro,
         Outdoor Photography Nakuru, Professional Photography Kenya, Njoro Photography Services, Videography Nakuru County, Wedding Coverage Kenya, 
         Event Coverage Njoro, Photography and Videography Kenya, Creative Photography Nakuru, Kwanza Images Njoro, Photography Studio Kenya" />





    <title>KWANZA IMAGES STUDIO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">


</head>

<body>

    <!-- Loader -->
    <div class="loader-container">
        <div class="loader"></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo and Brand Name -->
            <div class="d-flex align-items-center">
                <img src="{{ asset('assets/images/logo.jpg') }}" alt="Logo" class="navbar-logo">
                <a class="navbar-brand d-none d-md-block" href="{{ route('home') }}">KWANZA IMAGES STUDIO</a>
            </div>

            <!-- Navbar toggler for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blogs.index') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary btn-sm px-3" href="{{ route('register') }}" onclick="window.location=this.href; return false;">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary btn-sm px-3" href="{{ route('login') }}" onclick="window.location=this.href; return false;">Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>




    @yield('content')
    <!-- Footer Section -->
    <footer class="footer-section">
        <div class="container text-center">
            <!-- Contact Details -->
            <p class="footer-contact">
                <i class="fas fa-phone-alt"></i> <a href="tel:+254710487582">+254 710 487 582</a> |
                <i class="fas fa-envelope"></i> <a href="mailto:kwanzaimages@gmail.com">KwanzaImages@gmail.com</a>
            </p>

            <!-- Logo & Social Media Icons -->
            <div id="social-container">
                <!-- Logo -->
                <a href="#" class="logo-container">
                    <img src="{{ asset('assets/images/logo.jpg') }}" alt="Kwanza Images Logo">
                </a>

                <!-- Social Icons -->
                <a href="https://www.facebook.com/profile.php?id=100085280299975&mibextid=ZbWKwL" class="social-icon facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>

                <a href="https://www.instagram.com/kwanzaimages?igsh=MTluNjF4b2tnb3QweA==" class="social-icon instagram">
                    <i class="fab fa-instagram"></i>
                </a>

                <a href="https://youtube.com/@kwanzashow?si=HKX2YSKTqYg_bfbE" class="social-icon youtube">
                    <i class="fab fa-youtube"></i>
                </a>

                <!-- Threads Icon -->
                <a href="#" class="social-icon threads">
                    <img src="{{ asset('assets/images/threads.png') }}" alt="Threads">
                </a>
            </div>

            <!-- Copyright Text -->
            <p class="footer-text">&copy; 2024 Kwanza Images. Designed by <a href="#" class="designer-link">Dijisoftwares ICT Hub</a>.</p>
        </div>
    </footer>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "LocalBusiness",
            "name": "Kwanza Images Studio",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Njoro Posta, Njoro Town",
                "addressLocality": "Nakuru County",
                "addressCountry": "Kenya"
            },
            "telephone": "+254700123456",
            "email": "info@kwanzaimages.co.ke",
            "url": "https://kwanzaimages.co.ke"
        }
    </script>

</body>

</html>