@extends('layouts.app')
@section('content')
<div class="container">
    @include('layouts.page_header')
    <div class="form-wrapper card p-4 shadow-sm">

      <h4 class="text-center mb-4">🛒 Edit Purchase Type</h4>

      <form action="{{ route('purchase_type.update', $purchase_Type->id) }}" method="POST">

        @csrf
        @method('PUT')
        <!-- Purchase Type Name -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-bag-check"></i> Purchase Type Name</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-tag"></i></span>
            <input type="text" class="form-control" value="{{ $purchase_Type->name }}" name="name" placeholder="Enter purchase type name" required>
          </div>
          @error('name') <p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-chat-left-text"></i> Description</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-info-circle"></i></span>
            <textarea class="form-control" name="description" rows="3" placeholder="Optional description"> {{  $purchase_Type->name }}</textarea>
          </div>
          @error('description') <p class="text-danger">{{ $message }}</p>@enderror

        </div>

        <!-- Submit -->
        <div class="text-center mt-4">
          <button class="btn btn-primary px-5">
            <i class="bi bi-save2"></i> Update Purchase Type
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
