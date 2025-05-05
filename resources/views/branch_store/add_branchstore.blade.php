@extends('layouts.app')
@section('content')
<div class="container">
  @include('layouts.page_header')
  <div class="form-wrapper card p-4 shadow-sm">
    <h4 class="text-center mb-4">🏬📦 Add Branch Store Entry</h4>

    <form action="{{ route("branch-store.store") }}" method="POST">
      @csrf

      <!-- Branch ID -->
      <div class="mb-3">
        <label class="form-label"><i class="bi bi-diagram-3"></i> Branch Nam</label>
        <div class="input-group">
        <span class="input-group-text"><i class="bi bi-building-fill"></i></span>
        <select name="branch_id" id="branch_id"  class="form-control">
            <option class="text-gray" >Choose Your Branch</option>
            @foreach ($branches as $id=>$branch_no )
              <option value="{{$id}} " >{{$branch_no}} </option>
            @endforeach
          </select>
        </div>
        @error('branch_id')<p class="text-danger">{{ $message }}</p> @enderror
      </div>

      <!-- Product ID -->
      <div class="mb-3">

        <label class="form-label"><i class="bi bi-box"></i> Product Name</label>
        <div class="input-group">
        <span class="input-group-text"><i class="bi bi-box-fill"></i></span>
        <select name="product_id" id="product_id"  class="form-control">
            <option class="text-gray" >Choose Your Product</option>
            @foreach ($products as $id=>$product_no )
              <option value="{{$id}} " >{{$product_no}} </option>
            @endforeach
          </select>
        </div>
        @error('product_id')<p class="text-danger">{{ $message }}</p> @enderror
      </div>

      <!-- Company ID -->
      <div class="mb-3">
        <label class="form-label"><i class="bi bi-building"></i> Company Name</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-building-fill"></i></span>
          <select name="company_id" id="company_id"  class="form-control">
            <option class="text-gray" >Choose Your company</option>
            @foreach ($companies as $id=>$company_no )
              <option value="{{$id}} " >{{$company_no}} </option>
            @endforeach
          </select>
      </div>
      @error('company_id')<p class="text-danger">{{ $message }}</p> @enderror

      </div>

      <!-- Product Count -->
      <div class="mb-3">
        <label class="form-label"><i class="bi bi-123"></i> Product In Count</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-basket-fill"></i></span>
          <input type="number" id="product_in_count" class="form-control" name="product_in_count" placeholder="How many products?" required>
        </div>
      @error('product_in_count')<p class="text-danger">{{ $message }}</p> @enderror

      </div>

      <!-- Product Price -->
      <div class="mb-3">
        <label class="form-label"><i class="bi bi-currency-dollar"></i> Product Price</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-cash-stack"></i></span>
          <input type="number" step="0.01" id="price" class="form-control" name="price" placeholder="Price per unit" required>
        </div>
      @error('price')<p class="text-danger">{{ $message }}</p> @enderror

      </div>

      <!-- Total Price -->
      <div class="mb-3">
        <label class="form-label"><i class="bi bi-calculator"></i> Total Price</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-currency-exchange"></i></span>
          <input type="number" step="0.01" id="total_price" class="form-control" name="total_price" placeholder="Total price" required readonly>
        </div>
      @error('total_price')<p class="text-danger">{{ $message }}</p> @enderror

      </div>

      <!-- Product In Date -->
      <div class="mb-3">
        <label class="form-label"><i class="bi bi-calendar-event"></i> Date</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-calendar-check-fill"></i></span>
          <input type="date" class="form-control" name="date" required>
        </div>
      @error('date')<p class="text-danger">{{ $message }}</p> @enderror

      </div>

      <!-- Description -->
      <div class="mb-3">
        <label class="form-label"><i class="bi bi-chat-left-text"></i> Description</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-info-circle"></i></span>
          <textarea class="form-control" name="description" rows="3" placeholder="Optional notes about this entry"></textarea>
        </div>
      @error('description')<p class="text-danger">{{ $message }}</p> @enderror

      </div>

      <!-- Submit -->
      <div class="text-center mt-4">
        <button class="btn btn-primary px-5">
          <i class="bi bi-save2"></i> Save Entry
        </button>
      </div>
    </form>
  </div>
</div>

{{-- ✅ JavaScript for auto calculation --}}
<script>
  const countInput = document.getElementById('product_in_count');
  const priceInput = document.getElementById('price');
  const totalInput = document.getElementById('total_price');

  function calculateTotal() {
    const count = parseFloat(countInput.value) || 0;
    const price = parseFloat(priceInput.value) || 0;
    totalInput.value = (count * price).toFixed(2);
  }

  countInput.addEventListener('input', calculateTotal);
  priceInput.addEventListener('input', calculateTotal);
</script>


@endsection
