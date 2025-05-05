@extends('layouts.app')
@section('content')
<div class="container">
    @include('layouts.page_header')
    <div class="form-wrapper card p-4 shadow-sm">
      <h4 class="text-center mb-4">🚛 Add Container</h4>

      <form action="{{ route('container.update',$container->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label"><i class="bi bi-tag"></i> Product Type</label>
            <div class="input-group">
            <span class="input-group-text"><i class="bi bi-building-fill"></i></span>
            <select name="product_type_id" id="product_type_id"  class="form-control">
                <option class="text-gray" >Choose Your Product</option>
                @foreach ($products as $id => $product)
                <option value="{{ $id }}" {{ $container->product_type_id == $id ? 'selected' : '' }}>{{ $product }}</option>
              @endforeach
              </select>
            </div>
            @error('product_type_id')<p class="text-danger">{{ $message }}</p> @enderror
          </div>

          <div class="mb-3">
          <label class="form-label"><i class="bi bi-building"></i> Company</label>
            <div class="input-group">
            <span class="input-group-text"><i class="bi bi-building-fill"></i></span>
            <select name="company_id" id="company_id"  class="form-control">
                <option class="text-gray" >Choose Your Company</option>
                @foreach ($companies as $id => $company)
              <option value="{{ $id }}" {{ $container->company_id == $id ? 'selected' : '' }}>{{ $company }}</option>
            @endforeach
              </select>
            </div>
            @error('company_id')<p class="text-danger">{{ $message }}</p> @enderror
          </div>

  <!-- Product Item Count -->
  <div class="mb-3">
    <label class="form-label"><i class="bi bi-123"></i> Product Item Count</label>
    <div class="input-group">
      <span class="input-group-text"><i class="bi bi-archive-fill"></i></span>
      <input type="number" value="{{$container->item_count  }}" class="form-control" name="item_count" id="item_count" placeholder="Enter item count" required>
    </div>
    @error('item_count')<p class="text-danger">{{ $message }}</p> @enderror

  </div>

  <!-- Purchase Price -->
  <div class="mb-3">
    <label class="form-label"><i class="bi bi-currency-dollar"></i> Purchase Price (per item)</label>
    <div class="input-group">
      <span class="input-group-text"><i class="bi bi-cash-stack"></i></span>
      <input type="number" step="0.01"  value="{{$container->price  }}" class="form-control" name="price" id="price" placeholder="Enter price per item" required>
    </div>
    @error('price')<p class="text-danger">{{ $message }}</p> @enderror

  </div>

  <!-- Total Purchase Price -->
  <div class="mb-3">
    <label class="form-label"><i class="bi bi-currency-exchange"></i> Total Purchase Price</label>
    <div class="input-group">
      <span class="input-group-text"><i class="bi bi-calculator-fill"></i></span>
      <input type="number" value="{{$container->total_purchase_price  }}" step="0.01" class="form-control" name="total_purchase_price" id="total_purchase_price" placeholder="Total price" readonly>
    </div>
    @error('total_purchase_price')<p class="text-danger">{{ $message }}</p> @enderror

  </div>

        <!-- Description -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-card-text"></i> Description</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-chat-left-text-fill"></i></span>
            <textarea class="form-control" name="description" rows="3" placeholder="Enter container description">{{$container->description  }}</textarea>
          </div>
         @error('description')<p class="text-danger">{{ $message }}</p> @enderror

        </div>

        <!-- Submit -->
        <div class="text-center mt-4">
          <button class="btn btn-success px-5">
            <i class="bi bi-save"></i> Save Container
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- !-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- JavaScript for Dynamic Calculation -->
  <script>
    document.getElementById('item_count').addEventListener('input', calculateTotalPrice);
    document.getElementById('price').addEventListener('input', calculateTotalPrice);

    function calculateTotalPrice() {
      const itemCount = parseFloat(document.getElementById('item_count').value) || 0;
      const purchasePrice = parseFloat(document.getElementById('price').value) || 0;

      const totalPrice = itemCount * purchasePrice;
      document.getElementById('total_purchase_price').value = totalPrice.toFixed(2);
    }
  </script>
@endsection
