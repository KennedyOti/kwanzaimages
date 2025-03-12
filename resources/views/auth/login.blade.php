@extends('layouts.app')

@section('content')
<div class="login-container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4 w-100 text-light" style="max-width: 400px; background: rgba(0, 0, 0, 0.8); border-radius: 15px;">
        <h2 class="text-center mb-4 text-uppercase" style="color: deepskyblue;">Login</h2>

        <!-- Session Status -->
        @if (session('status'))
        <div class="alert alert-success mb-4">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input id="email" class="form-control @error('email') is-invalid @enderror"
                    type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input id="password" class="form-control @error('password') is-invalid @enderror"
                    type="password" name="password" placeholder="Password" required>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="mb-3 d-flex justify-content-between">
                <div class="form-check">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">Remember me</label>
                </div>
                @if (Route::has('password.request'))
                <a class="text-decoration-none text-primary" href="{{ route('password.request') }}">
                    Forgot password?
                </a>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-block">Log In</button>
            </div>

            <!-- Register Redirect -->
            <div class="text-center mt-3">
                <span class="small text-light">Don't have an account?</span>
                <a href="{{ route('register') }}" class="text-decoration-none text-primary">Sign up</a>
            </div>
        </form>
    </div>
</div>
@endsection