@extends('layouts.app')

@section('content')
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
@endsection