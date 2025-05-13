@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.page_header')

    <div class="form-wrapper card p-4 shadow-sm">

        <h4 class="text-center mb-4">🛍️ Add Customer Sale</h4>

        <!-- Global Error Alert -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>There were some problems with your input:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sales.store') }}" method="POST">
            @csrf

            <!-- Bill Number -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-receipt"></i> Bill Number</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-hash"></i></span>
                    <input type="text" class="form-control" name="bill_number" value="{{ old('bill_number') }}" placeholder="Enter bill number" required>
                </div>
                @error('bill_number') <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <!-- Product Type -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-box-seam"></i> Product Type</label>
                <select class="form-select" name="product_type_id" required>
                    <option value="">-- Select Product Type --</option>
                    @foreach($productTypes as $type)
                        <option value="{{ $type->id }}" {{ old('product_type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('product_type_id') <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <!-- Currency -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-currency-exchange"></i> Currency</label>
                <select class="form-select" name="currency_id" required>
                    <option value="">-- Select Currency --</option>
                    @foreach($currencies as $currency)
                        <option value="{{ $currency->id }}" {{ old('currency_id') == $currency->id ? 'selected' : '' }}>{{ $currency->currency_name }}</option>
                    @endforeach
                </select>
                @error('currency_id') <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <!-- Customer -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-person"></i> Customer</label>
                <select class="form-select" name="customer_id" required>
                    <option value="">-- Select Customer --</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                    @endforeach
                </select>
                @error('customer_id') <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <!-- Branch -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-building"></i> Branch</label>
                <select class="form-select" name="branch_id" required>
                    <option value="">-- Select Branch --</option>
                    @foreach($branches as $branch)
                        <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                    @endforeach
                </select>
                @error('branch_id') <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <!-- Sale Count -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-list-ol"></i> Product Sale Count</label>
                <input type="number" class="form-control" name="sale_count" value="{{ old('product_sale_count') }}" placeholder="Enter count" required>
                @error('sale_count') <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <!-- Sale Price -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-tag-fill"></i> Product Sale Price</label>
                <input type="number" step="0.01" class="form-control" name="price" value="{{ old('product_sale_price') }}" placeholder="Enter price" required>
                @error('price') <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <!-- Dollar Price -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-currency-dollar"></i> Dollar Price</label>
                <input type="number" step="0.01" class="form-control" name="dollar" value="{{ old('dollor_price') }}" placeholder="Amount in USD">
                @error('dollar') <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <!-- Afghani Price -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-currency-afghani"></i> Afghani Price</label>
                <input type="number" step="0.01" class="form-control" name="afghani" value="{{ old('afghani_price') }}" placeholder="Amount in AFN">
                @error('afghani') <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <!-- Kaldar Price -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-currency-exchange"></i> Kaldar Price</label>
                <input type="number" step="0.01" class="form-control" name="kaldar" value="{{ old('kaldar_price') }}" placeholder="Amount in PKR">
                @error('kaldar') <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-chat-left-dots"></i> Description</label>
                <textarea class="form-control" name="description" rows="3" placeholder="Optional description">{{ old('description') }}</textarea>
                @error('description') <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <!-- Submit -->
            <div class="text-center mt-4">
                <button class="btn btn-primary px-5">
                    <i class="bi bi-bag-check"></i> Save Sale
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
