@extends('layouts.app')
@section('content')
<div class="container">
    @include('layouts.page_header')
    <div class="form-wrapper card p-4 shadow-sm">
      <h4 class="text-center mb-4">🏢 Add Company</h4>

      <form action="{{ route('company.store') }}" method="POST">
        @csrf
        <!-- Company Name -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-building"></i> Company Name</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-building-fill"></i></span>
            <input type="text" class="form-control" name="name" placeholder="Enter company name" required>
          </div>
           @error('name')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <!-- Phone -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-telephone"></i> Phone</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
            <input type="tel" class="form-control" name="phone" placeholder="Enter phone number">
          </div>
           @error('phone')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-envelope"></i> Email</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
            <input type="email" class="form-control" name="email" placeholder="Enter email address">
          </div>
           @error('email')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <!-- Country -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-geo-alt"></i> Country</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
            <input type="text" class="form-control" name="country" placeholder="Enter country">
          </div>
           @error('country')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <!-- Address -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-geo-fill"></i> Address</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-geo"></i></span>
            <input type="text" class="form-control" name="address" placeholder="Enter address">
          </div>
           @error('address')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <!-- Dollar Account -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-currency-dollar"></i> Dollar Account</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-bank"></i></span>
            <input type="text" class="form-control" name="dollor_account" placeholder="Enter dollar account details">
          </div> @error('dollor_account')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <!-- Afghani Account -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-currency-exchange"></i> Afghani Account</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-bank2"></i></span>
            <input type="text" class="form-control" name="afghani_account" placeholder="Enter afghani account details">
          </div>
           @error('afghani_account')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <!-- Kaldar Account -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-cash-coin"></i> Kaldar Account</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-bank"></i></span>
            <input type="text" class="form-control" name="kaldar_account" placeholder="Enter kaldar account details">
          </div>
           @error('kaldar_account')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-card-text"></i> Description</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-chat-left-text-fill"></i></span>
            <textarea class="form-control" name="description" rows="3" placeholder="Enter company description"></textarea>
          </div>
           @error('description')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <!-- Submit -->
        <div class="text-center mt-4">
          <button class="btn btn-primary px-5">
            <i class="bi bi-save"></i> Save Company
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
