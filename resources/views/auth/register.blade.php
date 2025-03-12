@extends('layouts.app')

@section('content')
<div class="register-container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4 w-100 text-light" style="max-width: 400px; background: rgba(0, 0, 0, 0.8); border-radius: 15px;">
        <h2 class="text-center mb-4 text-uppercase" style="color: deepskyblue;">Create Account</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" placeholder="Full Name" required autofocus autocomplete="name">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="username">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" placeholder="Password" required autocomplete="new-password">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input id="password_confirmation" type="password"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
            </div>

            <!-- Login Redirect -->
            <div class="text-center mt-3">
                <span class="small text-light">Already have an account?</span>
                <a href="{{ route('login') }}" class="text-decoration-none text-primary">Log in</a>
            </div>
        </form>
    </div>
</div>
@endsection