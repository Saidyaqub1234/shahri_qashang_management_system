@extends('layouts.guest')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 w-100">
  <div class="col-md-5 bg-white p-4 rounded shadow-sm">

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
  <hr>
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <h3 class=" text-2xl  text-center text-blue float-center">Login</h3>
      <hr>

      <!-- Email Address -->
      <div class="mb-3">
        <label for="email" class="form-label">{{ __('Email') }}</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-envelope"></i></span>
          <input id="email" type="email" name="email" class="form-control" :value="old('email')" required autofocus autocomplete="username">
        </div>
        @error('email')
        <p class="mt-2 text-danger">{{ $message }}</p>
        @enderror
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label for="password" class="form-label">{{ __('Password') }}</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
          <input id="password" type="password" name="password" class="form-control" required autocomplete="current-password">
        </div>
        @error('password')
        <p class="mt-2 text-danger">{{ $message }}</p>
        @enderror
      </div>

      <!-- Remember Me -->
      <div class="form-check mb-3">
        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
        <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
      </div>

      <div class="d-flex justify-content-between align-items-center">
        @if (Route::has('password.request'))
        <a class="text-decoration-none small" href="{{ route('password.request') }}">
          {{ __('Forgot your password?') }}
        </a>
        @endif

        <button class="btn btn-success">
          {{ __('Log in') }}
        </button>
      </div>
    </form>

  </div>
</div>
@endsection
