@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.page_header')
    <div class="form-wrapper card p-4 shadow-sm">

        <h4 class="text-center mb-4">🛍️ Add Customer Sale</h4>

        <form action="{{ route('customer_sales.store') }}" method="POST">
            @csrf

            <!-- Bill Number -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-receipt"></i> Bill Number</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-hash"></i></span>
                    <input type="text" class="form-control" name="bill_number" placeholder="Enter bill number" required>
                </div>
                @error('bill_number') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Product Type -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-box-seam"></i> Product Type</label>
                <select class="form-select" name="product_type_id" required>
                    <option value="">-- Select Product Type --</option>
                    @foreach($productTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('product_type_id') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Currency -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-currency-exchange"></i> Currency</label>
                <select class="form-select" name="currency_id" required>
                    <option value="">-- Select Currency --</option>
                    @foreach($currencies as $currency)
                        <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                    @endforeach
                </select>
                @error('currency_id') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Customer -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-person"></i> Customer</label>
                <select class="form-select" name="customer_id" required>
                    <option value="">-- Select Customer --</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
                @error('customer_id') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Branch -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-building"></i> Branch</label>
                <select class="form-select" name="branch_id" required>
                    <option value="">-- Select Branch --</option>
                    @foreach($branches as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                    @endforeach
                </select>
                @error('branch_id') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Product -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-bag"></i> Product</label>
                <select class="form-select" name="product_id" required>
                    <option value="">-- Select Product --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                @error('product_id') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Sale Count -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-list-ol"></i> Product Sale Count</label>
                <input type="number" class="form-control" name="product_sale_count" placeholder="Enter count" required>
                @error('product_sale_count') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Sale Price -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-tag-fill"></i> Product Sale Price</label>
                <input type="number" step="0.01" class="form-control" name="product_sale_price" placeholder="Enter price" required>
                @error('product_sale_price') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Dollar Price -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-currency-dollar"></i> Dollar Price</label>
                <input type="number" step="0.01" class="form-control" name="dollor_price" placeholder="Amount in USD">
                @error('dollor_price') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Afghani Price -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-currency-afghani"></i> Afghani Price</label>
                <input type="number" step="0.01" class="form-control" name="afghani_price" placeholder="Amount in AFN">
                @error('afghani_price') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Kaldar Price -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-currency-exchange"></i> Kaldar Price</label>
                <input type="number" step="0.01" class="form-control" name="kaldar_price" placeholder="Amount in PKR">
                @error('kaldar_price') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-chat-left-dots"></i> Description</label>
                <textarea class="form-control" name="description" rows="3" placeholder="Optional description"></textarea>
                @error('description') <p class="text-danger">{{ $message }}</p>@enderror
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
