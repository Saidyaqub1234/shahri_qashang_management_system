@extends('layouts.app')
@section('content')
<div class="container">
    @include('layouts.page_header')
    <div class="form-wrapper card p-4 shadow-sm">
      <h4 class="text-center mb-4">👤 Eit Customer</h4>

      <!-- Image Preview -->
      <img id="preview" class="preview-image" src="{{ asset('uploads/Customers/'.$customer->image) }}" alt="Customer Image Preview" />

      <form action="{{ route('customer.update',$customer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Name -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-person"></i> First Name</label>
          <input type="text" class="form-control" value="{{ $customer->name }}" name="name" placeholder="Enter first name" required>
        </div>
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <!-- Last Name -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-person-bounding-box"></i> Last Name</label>
          <input type="text" class="form-control" value="{{ $customer->lastName }}"  name="lastName" placeholder="Enter last name">
        </div>
        @error('lastName')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <!-- Father's Name -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-person-lines-fill"></i> Father Name</label>
          <input type="text" class="form-control" value="{{ $customer->fatherName }}" name="fatherName" placeholder="Enter father name">
        </div>
        @error('lastName')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <!-- Phone -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-telephone-fill"></i> Phone</label>
          <input type="tel" class="form-control" value="{{ $customer->phone }}" name="phone" placeholder="Enter phone number">
        </div>
        @error('phone')
        <p class="text-danger">{{ $message }}</p>

        @enderror

        <!-- WhatsApp -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-whatsapp"></i> WhatsApp</label>
          <input type="tel" class="form-control" value="{{ $customer->whats_app }}" name="whats_app" placeholder="Enter WhatsApp number">
        </div>
        @error('whats_app')
        <p class="text-danger">{{ $message }}</p>

        @enderror

        <!-- Image Upload -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-image-fill"></i> Upload Customer Image</label>
          <input class="form-control" type="file" value="{{asset('uploads/Customers/'. $customer->image) }}" name="image" id="imageInput" accept="image/*">
        </div>
        @error('image')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <!-- Dollar Amount -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-currency-dollar"></i> Dollar Amount</label>
          <input type="number" step="0.01" value="{{ $customer->dollor_amount }}" class="form-control" name="dollor_amount" placeholder="USD Balance">
        </div>
        @error('dollor_amount')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <!-- Afghani Amount -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-currency-exchange"></i> Afghani Amount</label>
          <input type="number" step="0.01" value="{{ $customer->afghani_amount }}" class="form-control" name="afghani_amount" placeholder="AFN Balance">
        </div>
        @error('afghani_amount')
        <p class="text-danger">{{ $message }}</p>

        @enderror

        <!-- Kaldar Amount -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-cash-coin"></i> Kaldar Amount</label>
          <input type="number" step="0.01" value="{{ $customer->kaldar_amount }}" class="form-control" name="kaldar_amount" placeholder="Kaldar Balance">
        </div>
        @error('kaldar_amount')
        <p class="text-danger">{{ $message }}</p>

        @enderror

        <!-- Submit -->
        <div class="text-center mt-4">
          <button class="btn btn-success px-5">
            <i class="bi bi-save"></i> Save Customer
          </button>
        </div>
      </form>
    </div>
  </div>
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
