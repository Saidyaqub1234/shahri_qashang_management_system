@extends('layouts.app')
@section('content')
<div class="container">
    @include('layouts.page_header')
    <div class="form-wrapper card p-4 shadow-sm">
      <h4 class="text-center mb-4">🧾 Add Customer Sale</h4>

      <form action="/customer-sale/store" method="POST">
        <!-- Bill Number -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-receipt"></i> Bill Number</label>
          <input type="text" class="form-control" name="bill_number" placeholder="Enter bill number" required>
        </div>

        <!-- Product Type -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-box"></i> Product Type</label>
          <select class="form-select" name="product_type_id" required>
            <option selected disabled>Select product type</option>
            <option value="1">Type A</option>
            <option value="2">Type B</option>
            <!-- Add dynamic options -->
          </select>
        </div>

        <!-- Currency -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-currency-exchange"></i> Currency</label>
          <select class="form-select" name="currency_id" required>
            <option selected disabled>Select currency</option>
            <option value="1">USD</option>
            <option value="2">AFN</option>
            <option value="3">Kaldar</option>
          </select>
        </div>

        <!-- Customer -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-person"></i> Customer</label>
          <select class="form-select" name="customer_id" required>
            <option selected disabled>Select customer</option>
            <!-- Dynamic options -->
          </select>
        </div>

        <!-- Branch -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-geo-alt"></i> Branch</label>
          <select class="form-select" name="branch_id" required>
            <option selected disabled>Select branch</option>
            <!-- Dynamic options -->
          </select>
        </div>

        <!-- Product -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-cube"></i> Product</label>
          <select class="form-select" name="product_id" required>
            <option selected disabled>Select product</option>
            <!-- Dynamic options -->
          </select>
        </div>

        <!-- Sale Count -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-calculator"></i> Sale Count</label>
          <input type="number" step="1" class="form-control" name="product_sale_count" placeholder="Enter quantity sold" required>
        </div>

        <!-- Sale Price -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-cash"></i> Sale Price (per unit)</label>
          <input type="number" step="0.01" class="form-control" name="product_sale_price" placeholder="Enter sale price per unit" required>
        </div>

        <!-- Currency Prices -->
        <div class="row">
          <div class="col-md-4 mb-3">
            <label class="form-label"><i class="bi bi-currency-dollar"></i> Dollar Price</label>
            <input type="number" step="0.01" class="form-control" name="dollor_price" placeholder="USD">
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label"><i class="bi bi-currency-exchange"></i> Afghani Price</label>
            <input type="number" step="0.01" class="form-control" name="afghani_price" placeholder="AFN">
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label"><i class="bi bi-cash-coin"></i> Kaldar Price</label>
            <input type="number" step="0.01" class="form-control" name="kaldar_price" placeholder="Kaldar">
          </div>
        </div>

        <!-- Description -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-pencil-square"></i> Description</label>
          <textarea class="form-control" name="description" rows="3" placeholder="Optional details"></textarea>
        </div>

        <!-- Submit -->
        <div class="text-center mt-4">
          <button class="btn btn-success px-5">
            <i class="bi bi-save"></i> Save Sale
          </button>
        </div>
      </form>
    </div>
  </div>

@endsection