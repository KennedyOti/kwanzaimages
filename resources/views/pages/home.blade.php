@extends('layouts.app')

@section('content')
    <!-- Slideshow Section -->
    <section id="slideshow">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000"
            data-bs-touch="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/images/p7.jpg') }}" class="d-block w-100" alt="Slide 1"
                        style="height: 100vh; object-fit: cover;">
                    <div class="carousel-caption text-center">
                        <h5 class="fs-5">Capture Every Moment</h5>
                        <h1 class="fs-1">Preserving Memories</h1>
                        <h2 class="fs-2" style="color: cornflowerblue;">One Shot at a Time</h2>
                        <p class="lead">At KWANZA IMAGES, we believe every picture tells a story.</p>
                        <!-- Book Session Button -->
                        <a href="#book-session" class="btn btn-primary btn-lg mt-4"
                            style="background-color: cornflowerblue; color: white; border-radius: 50px; padding: 12px 30px;">Book
                            a Session</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/images/p14.jpg') }}" class="d-block w-100" alt="Slide 2"
                        style="height: 100vh; object-fit: cover;">
                    <div class="carousel-caption text-center">
                        <h5 class="fs-5">Your Story in Focus</h5>
                        <h1 class="fs-1">Timeless Photography</h1>
                        <h2 class="fs-3" style="color: cornflowerblue;">From Moments to Masterpieces</h2>
                        <!-- Book Session Button -->
                        <a href="#book-session" class="btn btn-primary btn-lg mt-4"
                            style="background-color: cornflowerblue; color: white; border-radius: 50px; padding: 12px 30px;">Book
                            a Session</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/images/stud.jpg') }}" class="d-block w-100" alt="Slide 3"
                        style="height: 100vh; object-fit: cover;">
                    <div class="carousel-caption text-center">
                        <h5 class="fs-5">Art in Every Frame</h5>
                        <h1 class="fs-1">Crafting Visual Memories</h1>
                        <h2 class="fs-3" style="color: cornflowerblue;">Emotion, Captured Perfectly</h2>
                        <p class="lead">Our passion for photography allows us to bring out the best in every moment.
                        </p>
                        <!-- Book Session Button -->
                        <a href="#book-session" class="btn btn-primary btn-lg mt-4"
                            style="background-color: cornflowerblue; color: white; border-radius: 50px; padding: 12px 30px;">Book
                            a Session</a>
                    </div>
                </div>
            </div>
            <!-- Carousel controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <h1 class="display-4">Capture Moments That Last Forever</h1>
            <p class="lead">Professional Photography Services</p>
            <a href="#gallery" class="btn btn-light">View Gallery</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section text-light" style="background-color: black; padding-top:110px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>About Us</h2>
                    <p>Kwanza Images specialises in offering quality photography and videography services.We offer
                        studio and outdoor photography,wedding and event coverage.

                    </p>
                </div>
                <div class="col-md-6">
                    <img id="logo1" src="{{ asset('assets/images/logo.jpg') }}" class="img-fluid" alt="About Me">
                </div>
            </div>
        </div>

    </section>

    <!-- Our Team Section -->
    <section id="our-team" class="team-section text-light" style="background-color: black; padding: 50px 0;">
        <div class="container">
            <h1 class="text-center" style="color:deepskyblue;">Our Team</h1>
            <div class="row" id="team-row">
                <!-- Dynamically display team members -->
                @foreach ($teams as $team)
                    <div class="col-md-3 text-center" style="margin-bottom: 30px;">
                        <img src="{{ asset('storage/' . $team->image_path) }}" alt="{{ $team->name }}"
                            class="img-fluid team-img" style="height: 200px; width: 200px; object-fit: cover; ">
                        <h4 style="color:deepskyblue;"><i class="fas fa-user-tie"></i> {{ $team->role }}</h4>
                        <p>{{ $team->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Gallery Section -->
    <section id="gallery" class="gallery-section" style="padding-top: 110px;">
        <div class="container">
            <h2 class="text-center mb-5" style="color: deepskyblue;"><b>Gallery</b></h2>
            <div class="row" id="gallery-row" style="display: flex; flex-wrap: wrap; justify-content: space-evenly;">
                <!-- Dynamically display images -->
                @foreach ($images as $image)
                    <!-- Image containers will be dynamically updated by JavaScript -->
                    <div class="col-4 mb-4 gallery-item" style="flex: 0 0 32%; margin: 0 1%; padding: 0;">
                        <img src="p10.jpg" class="img-fluid gallery-img" alt="Gallery Image 1"
                            style="width: 100%; height: auto;">
                    </div>
                @endforeach
            </div>

            <!-- Navigation Buttons -->
            <div class="text-center mt-4">
                <button class="btn btn-primary" id="prev-btn">Back</button>
                <button class="btn btn-primary" id="next-btn">Next</button>
            </div>
        </div>

    </section>
    <!-- Services Section -->
    <section id="services" class="services-section"
        style="padding-top: 110px; color: white; background-color: #072D4B;">
        <div class="container">
            <h2 class="text-center mb-5">Services</h2>
            <div class="row" id="services-row">
                <!-- Dynamically display services -->
                @foreach ($services as $service)
                    <div class="col-md-4 text-center mb-4">
                        <img src="{{ asset($service->image_path) }}" alt="{{ $service->title }}"
                            style="height: 400px; border-radius: 25px; width: 100%; object-fit: cover;" class="mb-3" />

                        <h3>{{ $service->title }}</h3>
                        <p>{{ $service->description }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Navigation Buttons -->
            <div class="text-center mt-4">
                <button class="btn btn-primary" id="prev-btn">Back</button>
                <button class="btn btn-primary" id="next-btn">Next</button>
            </div>
        </div>
    </section>



    <!-- Mission, Vision Section -->
    <section class="container py-5 bg-dark text-light custom-layout" id="about-us"
        style="margin-top: 10px; margin-bottom: 10px; ">
        <div class="row justify-content-center">
            <!-- Content Section -->
            <div class="content col-lg-10 text-center">
                <h2 class="mb-4"><b style="color: deepskyblue;">Our Commitment to You</b></h2>
                <p>With over a decade of experience, Kwanza Images is a premier photography studio based in Kenya. Our
                    team of passionate photographers is dedicated to capturing life's most beautiful moments with
                    creativity and precision. We specialize in delivering stunning and timeless visuals, turning your
                    memories into lasting art. Let us bring your vision to life through the lens, with every shot
                    crafted to perfection.</p>

                <h3 class="mt-5 mb-4"><b>Our Mission</b></h3>
                <p>To deliver breathtaking photography that exceeds client expectations. With creativity, precision, and
                    a passion for excellence, we strive to immortalize your most cherished moments in stunning visual
                    art that will stand the test of time.</p>

                <h3 class="mt-5 mb-4"><b>Our Vision</b></h3>
                <p>To be Kenya's leading photography studio, known for our innovative approach, artistic excellence, and
                    unparalleled client satisfaction. We aim to capture and preserve memories that tell your story with
                    elegance and beauty.</p>
            </div>
        </div>
    </section>

    <!-- Kwanza Show Section -->
    <section class="kwanza-show-section py-5" style=" color: white; background-color: #072D4B;">
        <div class="container">
            <div class="row align-items-center">
                <!-- Text Content for Large Screens -->
                <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
                    <a href="https://youtube.com/@kwanzashow?si=HKX2YSKTqYg_bfbE" target="_blank"
                        rel="noopener noreferrer">
                        <h1 class="display-4 " style="font-family: 'Times New Roman', Times, serif;"><b>Kwanza
                                Show</b></h1>
                    </a>
                    <p class="lead">Welcome to Kwanza Show, where we capture the most precious moments of your life
                        through the lens of perfection. Experience the magic of photography with us.</p>
                </div>

                <!-- Video for Large Screens -->
                <div class="col-md-6 text-center">
                    <video class="w-100" controls autoplay muted loop>
                        <source src="{{ asset('assets/images/vid.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </section>

    <!-- book session form -->
    <section id="book-session" class="py-5"
        style="background-color: #f8f9fa; background-image: url({{ asset('assets/images/p8.jpg') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 class="mb-4"
                        style="font-weight: 700; font-family: 'Broadway', sans-serif; color: white; padding-top:80px;">Book
                        a Session</h2>
                    <p class="text-muted mb-5 text-white" style="color: white !important;">We capture your most precious
                        moments. Fill in the form to book a session with us!</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form class="p-4 bg-white rounded shadow-lg needs-validation text-center"
                        style="background-color: rgba(255, 255, 255, 0.7);" novalidate>
                        <!-- Full Names -->
                        <div class="form-group">
                            <label for="fullNames" class="d-block"
                                style="font-family: 'Cascadier Code Light', sans-serif;">Full Names</label>
                            <input type="text" class="form-control form-control-lg text-center" id="fullNames"
                                placeholder="Enter full names" style="font-family: 'Cascadier Code Light', sans-serif;"
                                required>
                            <div class="invalid-feedback text-left">
                                Please enter your full names.
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email" class="d-block"
                                style="font-family: 'Cascadier Code Light', sans-serif;">Email</label>
                            <input type="email" class="form-control form-control-lg text-center" id="email"
                                placeholder="Enter email" style="font-family: 'Cascadier Code Light', sans-serif;"
                                required>
                            <div class="invalid-feedback text-left">
                                Please enter a valid email.
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="form-group">
                            <label for="phone" class="d-block"
                                style="font-family: 'Cascadier Code Light', sans-serif;">Phone</label>
                            <input type="tel" class="form-control form-control-lg text-center" id="phone"
                                placeholder="Enter phone number" style="font-family: 'Cascadier Code Light', sans-serif;"
                                required>
                            <div class="invalid-feedback text-left">
                                Please enter a valid phone number.
                            </div>
                        </div>

                        <!-- Service -->
                        <div class="form-group">
                            <label for="service" class="d-block"
                                style="font-family: 'Cascadier Code Light', sans-serif;">Service</label>
                            <select class="form-control form-control-lg text-center" id="service"
                                style="font-family: 'Cascadier Code Light', sans-serif;" required>
                                <option value="">Choose a service...</option>
                                <option value="Wedding">Wedding</option>
                                <option value="Outdoor">Outdoor</option>
                                <option value="Traditional">Traditional</option>
                                <option value="Studio">Studio</option>
                                <option value="Graduation">Graduation</option>
                            </select>
                            <div class="invalid-feedback text-left">
                                Please select a service.
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="form-group">
                            <label for="location" class="d-block"
                                style="font-family: 'Cascadier Code Light', sans-serif;">Location</label>
                            <input type="text" class="form-control form-control-lg text-center" id="location"
                                placeholder="Enter location" style="font-family: 'Cascadier Code Light', sans-serif;"
                                required>
                            <div class="invalid-feedback text-left">
                                Please enter the location.
                            </div>
                        </div>

                        <!-- Date -->
                        <div class="form-group">
                            <label for="date" class="d-block"
                                style="font-family: 'Cascadier Code Light', sans-serif;">Date</label>
                            <input type="datetime-local" class="form-control form-control-lg text-center" id="date"
                                required>
                            <div class="invalid-feedback text-left">
                                Please choose a date.
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary btn-lg mt-4">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- Contact Section -->
    <section id="contact" class="contact-section"
        style="padding-top: 110px; background-color: rgba(0, 86, 179, 0.5); background-image: url('{{ asset('assets/images/p14.jpg') }}'); background-size: cover; background-position: center;">

        <div class="container">
            <h2 id="contact-header" class="text-center mb-5">Get in Touch</h2>
            <div class="row" id="contact-content">
                <!-- Left side with text -->
                <div class="col-md-6" id="contact-left">
                    <h3>We're here to help!</h3>
                    <p id="contact-intro">Have any questions or need to book a session? Feel free to reach out to us.
                        We’ll get back to you as soon as possible!</p>
                    <p id="contact-details">Our team is always available to discuss your photography needs. Let’s make
                        your moments unforgettable!</p>
                </div>
                <!-- Right side with form -->
                <div class="col-md-6" id="contact-form-container">
                    <form id="contact-form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-light" id="submit-btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
