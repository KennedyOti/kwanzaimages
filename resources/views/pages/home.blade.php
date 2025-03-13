@extends('layouts.app')

@section('content')
<!-- Slideshow Section -->
<section id="slideshow">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000" data-bs-touch="true">

        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/images/p7.webp') }}" class="d-block w-100 slide-image" alt="Slide 1">
                <div class="carousel-caption text-center">
                    <h1 class="animate-fade-in">KWANZA IMAGES STUDIO</h1>
                    <h2 class="animate-slide-up">One Shot at a Time</h2>
                    <p class="lead animate-fade-in">Your Trusted Photography & Videography Partner in Njoro, Nakuru County</p>
                    <a href="#book-session" class="btn btn-primary btn-lg animate-slide-up">Book a Session</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/images/p14.webp') }}" class="d-block w-100 slide-image" alt="Slide 2">
                <div class="carousel-caption text-center">
                    <h1 class="animate-fade-in">Timeless Photography</h1>
                    <h2 class="animate-slide-up">From Moments to Masterpieces</h2>
                    <a href="#book-session" class="btn btn-primary btn-lg animate-slide-up">Book a Session</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/images/stud.webp') }}" class="d-block w-100 slide-image" alt="Slide 3">
                <div class="carousel-caption text-center">
                    <h1 class="animate-fade-in">Crafting Visual Memories</h1>
                    <h2 class="animate-slide-up">Emotion, Captured Perfectly</h2>
                    <p class="lead animate-fade-in">Our passion for photography allows us to bring out the best in every moment.</p>
                    <a href="#book-session" class="btn btn-primary btn-lg animate-slide-up">Book a Session</a>
                </div>
            </div>
        </div>

        <!-- Navigation Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
</section>
<!-- End of Slideshow Section -->

<!-- About Section -->
<section id="about" class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Image Section -->
            <div class="col-lg-6">
                <div class="about-image">
                    <img src="{{ asset('assets/images/out.jpg') }}" class="img-fluid rounded" alt="About Us">
                </div>
            </div>

            <!-- Content Section -->
            <div class="col-lg-6">
                <div class="about-content">
                    <h2 class="animate-fade-in">About Kwanza Images Studio</h2>

                    <div class="about-text-block animate-slide-up">
                        <p>
                            Welcome to Kwanza Images Studio, your trusted destination for professional photography and videography in Njoro Town, Nakuru County. Conveniently located at Njoro Egerton, we specialize in capturing your most cherished moments with precision and creativity. Whether it's stunning portraits, family photos, captivating landscapes, or event coverage, our expert team delivers high-quality results that exceed expectations. We also offer comprehensive wedding photography to ensure every detail of your special day is beautifully preserved. Choose Kwanza Images for unmatched quality, professionalism, and a personalized touch that brings your vision to life.
                        </p>
                    </div>

                    <a href="#gallery" class="btn btn-primary btn-custom animate-slide-up">View Our Work</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of About Section -->


<!-- Our Team Section -->
<section id="our-team" class="team-section">
    <div class="container">
        <h1 class="text-center section-title">Meet Our Team</h1>
        <div class="row justify-content-center">
            <!-- CEO -->
            <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    <img src="{{ asset('assets/images/ceo.jpg') }}" alt="CEO" class="team-img" loading="lazy">
                    <div class="team-info">
                        <h4>Chief Executive Officer</h4>
                        <p>Yabesh Mabea</p>
                    </div>
                </div>
            </div>

            <!-- Chief Operations -->
            <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    <img src="{{ asset('assets/images/chiefop.jpg') }}" alt="Chief Operations" class="team-img" loading="lazy">
                    <div class="team-info">
                        <h4>Chief Operations Officer</h4>
                        <p>Akengo Omusale</p>
                    </div>
                </div>
            </div>

            <!-- Customer Care -->
            <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    <img src="{{ asset('assets/images/customer care1.jpg') }}" alt="Customer Care" class="team-img" loading="lazy">
                    <div class="team-info">
                        <h4>Customer Care</h4>
                        <p>Georgina</p>
                    </div>
                </div>
            </div>

            <!-- Director -->
            <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    <img src="{{ asset('assets/images/director.jpg') }}" alt="Director" class="team-img" loading="lazy">
                    <div class="team-info">
                        <h4>Director</h4>
                        <p>Earnest Nyakiba</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Our Team Section -->

<!-- Gallery Section -->
<section id="gallery" class="gallery-section">
    <div class="container">
        <h2 class="text-center section-title">Gallery</h2>

        <!-- Masonry Grid -->
        <div class="gallery-grid" id="gallery-row">
            <!-- Images dynamically updated via JavaScript -->
        </div>

        <!-- Navigation Buttons -->
        <div class="text-center mt-4">
            <button class="btn btn-primary gallery-btn" id="prev-btn">Back</button>
            <button class="btn btn-primary gallery-btn" id="next-btn">Next</button>
        </div>
    </div>
</section>
<!-- End of Gallery Section -->

<!-- Services Section -->
<section id="services" class="services-section py-5">
    <div class="container">
        <h2 class="text-center section-title mb-4">Our Services</h2>
        <div class="row justify-content-center" id="services-row">

            <!-- Service 1 -->
            <div class="col-md-4 col-sm-6">
                <div class="service-card">
                    <img src="{{ asset('assets/images/p50.jpg') }}" alt="Wrap Photography" class="service-img">
                    <div class="service-content">
                        <h3>Wrap Photography</h3>
                        <p>Creative and artistic photoshoots featuring beautifully wrapped setups, perfect for newborns, maternity sessions, or styled portraits.</p>
                    </div>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="col-md-4 col-sm-6">
                <div class="service-card">
                    <img src="{{ asset('assets/images/wed.jpg') }}" alt="Wedding Photography" class="service-img">
                    <div class="service-content">
                        <h3>Wedding Photography</h3>
                        <p>Documenting your love story with timeless images that capture the elegance, joy, and emotion of your special day.</p>
                    </div>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="col-md-4 col-sm-6">
                <div class="service-card">
                    <img src="{{ asset('assets/images/p5.jpg') }}" alt="Outdoor Photography" class="service-img">
                    <div class="service-content">
                        <h3>Outdoor Photography</h3>
                        <p>Capturing stunning portraits in natural settings, bringing your story to life with the beauty of the outdoors.</p>
                    </div>
                </div>
            </div>

            <!-- Service 4 -->
            <div class="col-md-4 col-sm-6">
                <div class="service-card">
                    <img src="{{ asset('assets/images/p15.jpg') }}" alt="Traditional Photography" class="service-img">
                    <div class="service-content">
                        <h3>Traditional Photography</h3>
                        <p>Capturing timeless moments with classic techniques and attention to detail for all types of events.</p>
                    </div>
                </div>
            </div>

            <!-- Service 5 -->
            <div class="col-md-4 col-sm-6">
                <div class="service-card">
                    <img src="{{ asset('assets/images/p8.jpg') }}" alt="Studio Photography" class="service-img">
                    <div class="service-content">
                        <h3>Studio Photography</h3>
                        <p>Expertly crafted portraits and commercial shoots with controlled lighting and personalized setups.</p>
                    </div>
                </div>
            </div>

            <!-- Service 6 -->
            <div class="col-md-4 col-sm-6">
                <div class="service-card">
                    <img src="{{ asset('assets/images/p19.jpg') }}" alt="Graduation Photography" class="service-img">
                    <div class="service-content">
                        <h3>Graduation Photography</h3>
                        <p>Capturing the pride and joy of this special moment with stunning, memorable photos.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End of Services Section -->


<!-- Mission & Vision Section -->
<section class="mission-vision-section py-5" id="about-us">
    <div class="container">
        <h2 class="section-title text-center mb-5">Our Commitment to You</h2>
        <div class="row justify-content-center">

            <!-- Mission Card -->
            <div class="col-md-5">
                <div class="info-card">
                    <div class="card-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p>To deliver breathtaking photography that exceeds client expectations. With creativity, precision, and passion, we strive to immortalize your most cherished moments in stunning visual art that stands the test of time.</p>
                </div>
            </div>
            <br>
            <!-- Vision Card -->
            <div class="col-md-5">
                <div class="info-card">
                    <div class="card-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3>Our Vision</h3>
                    <p>To be Kenya’s leading photography studio, known for our innovative approach, artistic excellence, and unparalleled client satisfaction. We aim to capture and preserve memories that tell your story with elegance and beauty.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Kwanza Show Section -->
<section class="kwanza-show-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Text Content -->
            <div class="col-md-6 text-center text-md-left">
                <a href="https://youtube.com/@kwanzashow?si=HKX2YSKTqYg_bfbE" target="_blank" class="kwanza-title">
                    <h1 class="display-4"><b>Kwanza Show</b></h1>
                </a>
                <p class="lead">
                    Welcome to the Kwanza Show! Dive into a world of impactful storytelling that inspires and transforms lives, one story at a time.
                    At Kwanza Show, we shine a spotlight on real-life experiences, journeys, and narratives that resonate deeply with our audience.
                    Our mission is to bring meaningful stories to life—stories that educate, empower, and ignite positive change in communities.
                </p>
                <p class="lead">Join us and experience the power of storytelling like never before!</p>
                <a href="https://www.youtube.com/@kwanzashow" target="_blank" class="btn btn-watch">Watch More</a>
            </div>

            <!-- YouTube Video Embed -->
            <div class="col-md-6 text-center">
                <div class="video-container">
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/CPL4ybLzSA4?autoplay=1&mute=1&loop=1&playlist=CPL4ybLzSA4"
                        title="Kwanza Show Video"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section -->
<section id="contact" class="contact-section py-5">
    <div class="container">
        <h2 class="text-center section-title">Book a Session</h2>
        <p class="text-center text-muted mb-4">Fill in the form below to schedule a session with us!</p>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-card">
                    <form action="{{ route('book.session') }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <!-- Full Names -->
                        <div class="form-group">
                            <label for="fullNames">Full Names</label>
                            <input type="text" name="full_names" class="form-control" id="fullNames" placeholder="Enter full names" required>
                            <div class="invalid-feedback">Please enter your full names.</div>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                            <div class="invalid-feedback">Please enter a valid email.</div>
                        </div>

                        <!-- Phone -->
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" name="phone" class="form-control" id="phone" placeholder="Enter phone number" required>
                            <div class="invalid-feedback">Please enter a valid phone number.</div>
                        </div>

                        <!-- Service Selection -->
                        <div class="form-group">
                            <label for="service">Select Service</label>
                            <select name="service" class="form-control" id="service" required>
                                <option value="">Choose a service...</option>
                                <option value="Wedding">Wedding</option>
                                <option value="Outdoor">Outdoor</option>
                                <option value="Traditional">Traditional</option>
                                <option value="Studio">Studio</option>
                                <option value="Graduation">Graduation</option>
                            </select>
                            <div class="invalid-feedback">Please select a service.</div>
                        </div>

                        <!-- Location -->
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" class="form-control" id="location" placeholder="Enter location" required>
                            <div class="invalid-feedback">Please enter the location.</div>
                        </div>

                        <!-- Date Selection -->
                        <div class="form-group">
                            <label for="date">Preferred Date</label>
                            <input type="datetime-local" name="date" class="form-control" id="date" required>
                            <div class="invalid-feedback">Please select a date.</div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-lg submit-btn">Book Now</button>
                        </div>
                    </form>

                    <!-- Success & Error Messages -->
                    @if (session('success'))
                    <div class="alert alert-success mt-3 text-center">{{ session('success') }}</div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection