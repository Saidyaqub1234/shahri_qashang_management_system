@extends('layouts.app')

@section('content')
<div class="container">
  @include('layouts.page_header')
  <div class="form-wrapper card p-4 shadow-sm">
    <h4 class="text-center mb-4">✏️ Edit Saraf</h4>

    <!-- Image Preview -->
    <img id="preview" class="preview-image mb-3 d-block mx-auto rounded-circle"
         src="{{ $saraf->image ? asset('uploads/saraf_images/' . $saraf->image) : 'https://via.placeholder.com/100' }}"
         alt="Saraf Image Preview" style="width: 100px; height: 100px; object-fit: cover;">

    <form method="POST" action="{{ route('saraf.update', $saraf->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PATCH')

      <!-- Image Upload -->
      <div class="mb-3">
        <label class="form-label"><i class="bi bi-image"></i> Upload Saraf Image</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-upload"></i></span>
          <input class="form-control" name="image" type="file" id="imageInput" accept="image/*">
        </div>
        @error('image') <p class="mt-2 text-danger small">{{ $message }}</p>@enderror
      </div>

      <!-- Saraf Name -->
      <div class="mb-3">
        <label class="form-label"><i class="bi bi-person-badge"></i> Saraf Name</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-person"></i></span>
          <input type="text" class="form-control" name="name" value="{{ old('name', $saraf->name) }}" required>
        </div>
        @error('name') <p class="mt-2 text-danger small">{{ $message }}</p>@enderror
      </div>

      <!-- Phone -->
      <div class="mb-3">
        <label class="form-label"><i class="bi bi-telephone"></i> Phone</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
          <input type="text" class="form-control" name="phone" value="{{ old('phone', $saraf->phone) }}" required>
        </div>
        @error('phone') <p class="mt-2 text-danger small">{{ $message }}</p>@enderror
      </div>

      <!-- Email -->
      <div class="mb-3">
        <label class="form-label"><i class="bi bi-envelope"></i> Email</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
          <input type="email" class="form-control" name="email" value="{{ old('email', $saraf->email) }}">
        </div>
        @error('email') <p class="mt-2 text-danger small">{{ $message }}</p>@enderror
      </div>

      <!-- Shop Number -->
      <div class="mb-3">
        <label class="form-label"><i class="bi bi-shop"></i> Shop Number</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-123"></i></span>
          <input type="text" class="form-control" name="shop_number" value="{{ old('shop_number', $saraf->shop_number) }}">
        </div>
        @error('shop_number') <p class="mt-2 text-danger small">{{ $message }}</p>@enderror
      </div>

      <!-- Address -->
      <div class="mb-3">
        <label class="form-label"><i class="bi bi-geo-alt"></i> Address</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-geo"></i></span>
          <input type="text" class="form-control" name="address" value="{{ old('address', $saraf->address) }}">
        </div>
        @error('address') <p class="mt-2 text-danger small">{{ $message }}</p>@enderror
      </div>

      <!-- Description -->
      <div class="mb-3">
        <label class="form-label"><i class="bi bi-chat-left-text"></i> Description</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-info-circle"></i></span>
          <textarea class="form-control" name="description" rows="3">{{ old('description', $saraf->description) }}</textarea>
        </div>
        @error('description') <p class="mt-2 text-danger small">{{ $message }}</p>@enderror
      </div>

      <!-- Submit Button -->
      <div class="text-center mt-4">
        <button class="btn btn-success px-5">
          <i class="bi bi-check-circle"></i> Update Saraf
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
