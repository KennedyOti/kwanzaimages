@extends('layouts.app')

@section('content')
<br><br><br>
    <div class="container mt-5">

        <div class="blog-details">
            <h1 class="blog-title">{{ $blog->title }}</h1>
            <p class="blog-meta"><strong>By: {{ $blog->author }} | Date: {{ $blog->date_posted }}</strong></p>

            <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid blog-image" alt="Blog Image">

            <p class="blog-content">{{ $blog->content }}</p>

            <!-- Like Button -->
            <form action="{{ route('blog.like', $blog->id) }}" method="POST" class="mb-4">
                @csrf
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-hand-thumbs-up"></i> Like ({{ $blog->likes }})
                </button>
            </form>
        </div>

        <div class="comments-section">
            <h3 class="comments-title">Comments</h3>

            <!-- Post a Comment Form -->
            <h4 class="comment-form-title">Post a Comment</h4>
            <form method="POST" action="{{ route('blog.comment.store', $blog->id) }}">
                @csrf
                <div class="form-group mb-3">
                    <textarea class="form-control" name="comment" rows="4" placeholder="Enter your comment" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post Comment</button>
            </form>

            <!-- Display Comments -->
            <div class="comments-list mt-4">
                @foreach ($comments as $comment)
                    <div class="card comment-card mt-3">
                        <div class="card-body">
                            <p class="comment-author"><strong>{{ $comment->name }}</strong></p>
                            <p class="comment-text">{{ $comment->comment }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div>
                <!-- Go Back Button -->
                <a href="{{ route('blogs.index') }}" class="btn btn-secondary mt-3 mb-4"><i
                        class="bi bi-arrow-left-circle"></i> Go
                    Back</a>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Custom CSS for Blog Details Page */
        .blog-details {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .blog-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .blog-meta {
            font-size: 1rem;
            color: #666;
            margin-bottom: 20px;
        }

        .blog-image {
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .blog-content {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #444;
        }

        .btn {
            font-size: 1rem;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .comments-section {
            margin-top: 50px;
        }

        .comments-title {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .comment-form-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .comments-list {
            margin-top: 30px;
        }

        .comment-card {
            border: none;
            background-color: #f7f7f7;
            border-radius: 8px;
            padding: 15px;
        }

        .comment-author {
            font-weight: bold;
            color: #333;
        }

        .comment-text {
            font-size: 1rem;
            color: #555;
        }

        /* Spacing and Alignment */
        .mb-4 {
            margin-bottom: 30px !important;
        }

        .mt-3 {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        /* Button Icons */
        .bi {
            margin-right: 5px;
        }

        .comments-section form {
            margin-bottom: 30px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .blog-title {
                font-size: 2rem;
            }

            .blog-meta {
                font-size: 0.9rem;
            }
        }
    </style>
@endpush
