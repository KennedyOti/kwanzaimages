@extends('layouts.portal')

@section('content')
    <br><br>
    <!-- Bootstrap CDN for Modal functionality -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container">
        <h1 class="text-center">Services Management</h1>
        <!-- Success Alert -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close btn-success" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- Add New Service Button -->
        <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addServiceModal">Add New
            Service</button>

        <!-- Services Display -->
        <div class="row">
            @foreach ($services as $service)
                <div class="col-md-4 mb-4">
                    <img src="{{ asset($service->image_path) }}" class="img-fluid mb-2 service-image">
                    <h5>{{ $service->title }}</h5>
                    <p>{{ $service->description }}</p>
                    <button class="btn btn-warning btn-sm edit-btn" data-id="{{ $service->id }}"
                        data-title="{{ $service->title }}" data-description="{{ $service->description }}"
                        data-bs-toggle="modal" data-bs-target="#editServiceModal">Edit</button>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $service->id }}">Delete</button>
                </div>
            @endforeach
        </div>

        <!-- Add Service Modal -->
        <div class="modal fade" id="addServiceModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Service</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Service Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Service Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Select Image</label>
                                <input type="file" name="image" id="image" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Service Modal -->
        <div class="modal fade" id="editServiceModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="POST" id="editServiceForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Service</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="edit-title" class="form-label">Service Title</label>
                                <input type="text" name="title" id="edit-title" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-description" class="form-label">Service Description</label>
                                <textarea name="description" id="edit-description" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="edit-image" class="form-label">Select New Image (Optional)</label>
                                <input type="file" name="image" id="edit-image" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap CDN JS for Modal functionality -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Delete and Edit Functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const serviceId = this.getAttribute('data-id');
                    if (confirm('Are you sure you want to delete this service?')) {
                        fetch(`/services/${serviceId}`, {
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
                                    alert('Failed to delete the service. Please try again.');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('An error occurred while deleting the service.');
                            });
                    }
                });
            });

            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const serviceId = this.getAttribute('data-id');
                    const title = this.getAttribute('data-title');
                    const description = this.getAttribute('data-description');

                    const form = document.getElementById('editServiceForm');
                    form.action = `/services/${serviceId}`;
                    document.getElementById('edit-title').value = title;
                    document.getElementById('edit-description').value = description;
                });
            });
        });
    </script>

    <!-- Custom Styles -->
    <style>
        .service-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
@endsection
