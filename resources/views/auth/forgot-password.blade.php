@extends('layouts.guest')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 w-100">
  <div class="col-md-5 bg-white p-4 rounded shadow-sm">

    <div class="mb-3 text-muted small">
      {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
      @csrf

      <!-- Email Address -->
      <div class="mb-3">
        <label for="email" class="form-label">{{ __('Email') }}</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
          <input id="email" type="email" name="email" class="form-control" :value="old('email')" required autofocus>
        </div>
        @error('email')
        <p class="mt-2 text-danger">{{ $message }}</p>
        @enderror
      </div>

      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-info">
          {{ __('Email Password Reset Link') }}
        </button>
      </div>
    </form>

  </div>
</div>
@endsection
