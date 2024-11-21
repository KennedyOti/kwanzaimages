@extends('layouts.portal')

@section('content')
    <br><br>
    <!-- Bootstrap CDN for Modal functionality -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container">
        <h1 class="text-center">Gallery Management</h1>
        <!-- Success Alert -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close btn-success" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- Add New Image Button -->
        <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addImageModal">Add New Image</button>

        <!-- Gallery Display -->
        <div class="row">
            @foreach ($images as $image)
                <div class="col-md-4 mb-4">
                    <img src="{{ asset($image->image_path) }}" class="img-fluid mb-2 gallery-image">
                    <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $image->id }}">Delete</button>
                </div>
            @endforeach
        </div>

        <!-- Add Image Modal -->
        <div class="modal fade" id="addImageModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="image" class="form-label">Select Image</label>
                                <input type="file" name="image" id="image" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Image</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

    <!-- Bootstrap CDN JS for Modal functionality -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Delete Functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const imageId = this.getAttribute('data-id');
                    if (confirm('Are you sure you want to delete this image?')) {
                        fetch(`/gallery/${imageId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json',
                                },
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    alert(data.message);
                                    location.reload();
                                } else {
                                    alert('Failed to delete the image. Please try again.');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('An error occurred while deleting the image.');
                            });
                    }
                });
            });
        });
    </script>

    <!-- Custom Styles -->
    <style>
        .gallery-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
@endsection
