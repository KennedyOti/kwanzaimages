@extends('layouts.app')

@section('content')
    <br><br><br>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Kwanza Blogs & News</h1>
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card custom-card">
                        <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="Blog Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text">{{ $blog->subtitle }}</p>
                            <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary custom-btn">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Custom CSS Styles */
        body {

            /* Transparent blue background */
        }

        .container {
            max-width: 1200px;
            /* Limiting max width */
            
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-10px);
            /* Card hover effect */
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
            /* Rounded top corners */
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #333;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
        }

        .btn {
            font-size: 0.9rem;
            padding: 10px 20px;
        }

        .custom-btn {
            background-color: #007bff;
            border: none;
            font-weight: bold;
        }

        .custom-btn:hover {
            background-color: #0056b3;
        }

        .mb-4 {
            margin-bottom: 30px;
            /* Ensuring consistent margin for all cards */
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            /* Ensuring equal spacing between columns */
        }

        .text-center {
            text-align: center;
        }
    </style>
@endpush
