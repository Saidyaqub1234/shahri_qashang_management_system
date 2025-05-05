@extends('layouts.app')
@section('content')
<div class="container">
  @include('layouts.page_header')
    <div class="form-wrapper card p-4 shadow-sm">
      <h4 class="text-center mb-4">👤 User Registration</h4>

      <!-- Image Preview -->
      <img id="preview" class="preview-image" src="https://via.placeholder.com/100" alt="Profile Image Preview" />

      <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label"><i class="bi bi-image"></i> Upload Profile Image</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-upload"></i></span>
              <input class="form-control" name="image" type="file" id="imageInput" accept="image">
            </div>
            @error('name')
            <p class="mt-2 text-danger small">{{ $message }}</p>
            @enderror
          </div>
        <!-- name -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-person"></i> User Name</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
            <input type="text" class="form-control" placeholder="Enter full name" name="name">
          </div>
          @error('name')
          <p class="mt-2 text-danger small">{{ $message }}</p>
          @enderror
        </div>

        <!-- Phone -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-telephone"></i> Phone</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
            <input type="tel" class="form-control"  name="phone" placeholder="Enter phone number">
          </div>
          @error('phone')
          <p class="mt-2 text-danger small">{{ $message }}</p>
          @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-envelope"></i> Email</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
            <input type="email" class="form-control" name="email" placeholder="Enter email address">
          </div>
          @error('email')
          <p class="mt-2 text-danger small">{{ $message }}</p>
          @enderror
        </div>


        <div class="mb-3">
            <label for="password" class="form-label"><i class="bi bi-lock-fill"></i> Password</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
              <input id="password" placeholder="Enter password" type="password" name="password" class="form-control" required autocomplete="new-password">
            </div>
            @error('password')
            <p class="mt-2 text-danger small">{{ $message }}</p>
            @enderror
          </div>
         <!-- Confirm Password -->
          <div class="mb-3">
            <label for="password" class="form-label"><i class="bi bi-lock-fill"></i> Confirm Password</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
              <input id="password_confirmation" placeholder="confirm password" type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
            </div>
            @error('password')
            <p class="mt-2 text-danger small">{{ $message }}</p>
            @enderror
          </div>

        <!-- Submit -->
        <div class="text-center mt-4">
          <button class="btn btn-primary px-5">
            <i class="bi bi-save"></i> Submit
          </button>
        </div>
      </form>
    </div>
  </div>
   <!-- Image Preview Script -->
   <script>
    document.getElementById("imageInput").addEventListener("change", function (e) {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (evt) {
          document.getElementById("preview").src = evt.target.result;
        };
        reader.readAsDataURL(file);
      }
    });
  </script>
@endsection
