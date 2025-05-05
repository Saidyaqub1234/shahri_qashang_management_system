@extends('layouts.app')
@section('content')
<div class="container">
    <div class="form-wrapper card p-4 shadow-sm">
      <h4 class="text-center mb-4">💱 Add Currency Type</h4>

      <form action="{{ route('currency.store') }}" method="POST">
        @csrf
        <!-- Currency Type Name -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-cash"></i> Currency Type Name</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-currency-exchange"></i></span>
            <input type="text" class="form-control" name="currency_name" placeholder="e.g., Dollar, Afghani" required>
          </div>
        </div>

        <!-- Currency Description -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-chat-text"></i> Description</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-file-text-fill"></i></span>
            <textarea class="form-control" name="currency_description" rows="3" placeholder="Enter description or notes about this currency type"></textarea>
          </div>
        </div>

        <!-- Submit -->
        <div class="text-center mt-4">
          <button class="btn btn-success px-5">
            <i class="bi bi-save"></i> Save Currency
          </button>
        </div>
      </form>
    </div>
  </div>


@endsection
