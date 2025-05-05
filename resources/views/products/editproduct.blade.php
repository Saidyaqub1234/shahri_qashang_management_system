
@extends('layouts.app')
@section('content')
<div class="container">
    @include('layouts.page_header')
    <div class="form-wrapper card p-4 shadow-sm">

      <h4 class="text-center mb-4">📦 Update Product Type</h4>

      <form action="{{ route('product-type.update',$product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Product Type Name -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-box"></i> Product Name</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-box-fill"></i></span>
            <input type="text" class="form-control" value='{{ $product->name }}' name="name" placeholder="Enter product type name" required>
          </div>
        </div>

        <!-- Product Description -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-card-text"></i> Product Description</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-chat-left-text-fill"></i></span>
            <textarea class="form-control" name="description" rows="3" placeholder="Enter description" required>{{ $product->description }}</textarea>
          </div>
        </div>

        <!-- Submit -->
        <div class="text-center mt-4">
          <button class="btn btn-success px-5">
            <i class="bi bi-save"></i> Save
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
