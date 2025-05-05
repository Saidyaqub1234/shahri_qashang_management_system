@extends('layouts.guest')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 w-100">
  <div class="col-md-6 bg-white p-4 rounded shadow-sm">

    <div class="mb-3 text-muted small">
      {{ __("Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.") }}
    </div>

    @if (session('status') == 'verification-link-sent')
      <div class="alert alert-success py-2 px-3 small mb-3">
        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
      </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mt-4">
      <!-- Resend Link Form -->
      <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary">
          {{ __('Resend Verification Email') }}
        </button>
      </form>

      <!-- Logout Form -->
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-outline-secondary btn-sm">
          {{ __('Log Out') }}
        </button>
      </form>
    </div>

  </div>
</div>
@endsection
