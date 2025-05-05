@extends('layouts.guest')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 w-100">
  <div class="col-md-5 bg-white p-4 rounded shadow-sm">

    <form method="POST" action="{{ route('password.store') }}">
      @csrf

      <!-- Password Reset Token -->
      <input type="hidden" name="token" value="{{ $request->route('token') }}">

      <!-- Email Address -->
      <div class="mb-3">
        <label for="email" class="form-label">{{ __('Email') }}</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
          <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}"
                 class="form-control" required autofocus autocomplete="username">
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
          <input id="password" type="password" name="password"
                 class="form-control" required autocomplete="new-password">
        </div>
        @error('password')
        <p class="mt-2 text-danger small">{{ $message }}</p>
        @enderror
      </div>

      <!-- Confirm Password -->
      <div class="mb-3">
        <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
          <input id="password_confirmation" type="password" name="password_confirmation"
                 class="form-control" required autocomplete="new-password">
        </div>
        @error('password_confirmation')
        <p class="mt-2 text-danger small">{{ $message }}</p>
        @enderror
      </div>

      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">
          {{ __('Reset Password') }}
        </button>
      </div>
    </form>

  </div>
</div>
@endsection
