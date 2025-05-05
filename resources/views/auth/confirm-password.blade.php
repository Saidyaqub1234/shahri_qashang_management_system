@extends('layouts.guest')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 w-100">
  <div class="col-md-5 bg-white p-4 rounded shadow-sm">

    <div class="mb-3 text-muted small">
      {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
      @csrf

      <!-- Password -->
      <div class="mb-3">
        <label for="password" class="form-label">{{ __('Password') }}</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
          <input id="password" type="password" name="password" class="form-control" required autocomplete="current-password">
        </div>
        @error('password')
        <p class="mt-2 text-danger small">{{ $message }}</p>
        @enderror
      </div>

      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">
          {{ __('Confirm') }}
        </button>
      </div>
    </form>

  </div>
</div>
@endsection
