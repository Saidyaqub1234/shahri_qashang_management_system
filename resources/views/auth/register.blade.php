@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 w-100">
  <div class="col-md-6 bg-white p-4 rounded shadow-sm">

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <!-- Name -->
      <div class="mb-3">
        <label for="name" class="form-label">{{ __('Name') }}</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
          <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus autocomplete="name">
        </div>
        @error('name')
        <p class="mt-2 text-danger small">{{ $message }}</p>
        @enderror
      </div>

      <!-- Email Address -->
      <div class="mb-3">
        <label for="email" class="form-label">{{ __('Email') }}</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
          <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autocomplete="username">
        </div>
        @error('email')
        <p class="mt-2 text-danger small">{{ $message }}</p>
        @enderror
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label for="password" class="form-label">{{ __('Password') }}</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
          <input id="password" type="password" name="password" class="form-control" required autocomplete="new-password">
        </div>
        @error('password')
        <p class="mt-2 text-danger small">{{ $message }}</p>
        @enderror
      </div>

      <!-- Confirm Password -->
      <div class="mb-4">
        <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
          <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
        </div>
        @error('password_confirmation')
        <p class="mt-2 text-danger small">{{ $message }}</p>
        @enderror
      </div>

      <div class="d-flex justify-content-between align-items-center">
        <a class="text-decoration-none small" href="{{ route('login') }}">
          {{ __('Already registered?') }}
        </a>

        <button type="submit" class="btn btn-primary">
          {{ __('Register') }}
        </button>
      </div>
    </form>

  </div>
</div>
@endsection
