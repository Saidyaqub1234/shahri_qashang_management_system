@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-wrapper card p-4 shadow-sm">
      <h4 class="text-center mb-4">💱 Edit Currency Type</h4>

      <form action="{{ route('currency.update', $currency->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Currency Type Name -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-cash"></i> Currency Type Name</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-currency-exchange"></i></span>
            <input type="text" class="form-control @error('currency_name') is-invalid @enderror" name="currency_name" value="{{ old('currency_name', $currency->currency_name) }}" placeholder="e.g., Dollar, Afghani" required>
            @error('currency_name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <!-- Currency Description -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-chat-text"></i> Description</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-file-text-fill"></i></span>
            <textarea class="form-control @error('currency_description') is-invalid @enderror" name="currency_description" rows="3" placeholder="Enter description or notes about this currency type">{{ old('currency_description', $currency->currency_description) }}</textarea>
            @error('currency_description')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <!-- Submit -->
        <div class="text-center mt-4">
          <button class="btn btn-success px-5">
            <i class="bi bi-save"></i> Update Currency
          </button>
        </div>
      </form>
    </div>
</div>

@endsection
