@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.page_header')
    <div class="form-wrapper card p-4 shadow-sm">

        <h4 class="text-center mb-4">✏️ Update Customer Sale</h4>

        <form action="{{ route('sales.update', $customerSale->id) }}" method="POST" >
            @csrf
            @method('PUT')

            <!-- Bill Number -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-receipt"></i> Bill Number</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-hash"></i></span>
                    <input type="text" class="form-control" name="bill_number" value="{{ old('bill_number', $customerSale->bill_number) }}" required>
                </div>
                @error('bill_number') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Product Type -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-box-seam"></i> Product Type</label>
                <select class="form-select" name="product_type_id" required>
                    <option value="">-- Select Product Type --</option>
                    @foreach($productTypes as $type)
                        <option value="{{ $type->id }}" {{ $type->id == $customerSale->product_type_id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
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
                        <option value="{{ $currency->id }}" {{ $currency->id == $customerSale->currency_id ? 'selected' : '' }}>
                            {{ $currency->currency_name }}
                        </option>
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
                        <option value="{{ $customer->id }}" {{ $customer->id == $customerSale->customer_id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
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
                        <option value="{{ $branch->id }}" {{ $branch->id == $customerSale->branch_id ? 'selected' : '' }}>
                            {{ $branch->name }}
                        </option>
                    @endforeach
                </select>
                @error('branch_id') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Product -->
            {{-- <div class="mb-3">
                <label class="form-label"><i class="bi bi-bag"></i> Product</label>
                <select class="form-select" name="product_id" required>
                    <option value="">-- Select Product --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ $product->id == $customerSale->product_id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
                @error('product_id') <p class="text-danger">{{ $message }}</p>@enderror
            </div> --}}

            <!-- Sale Count -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-list-ol"></i> Product Sale Count</label>
                <input type="number" class="form-control" name="sale_count" value="{{ old('sale_count', $customerSale->sale_count) }}" required>
                @error('sale_count') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Sale Price -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-tag-fill"></i> Product Sale Price</label>
                <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price', $customerSale->price) }}" required>
                @error('price') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Dollar Price -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-currency-dollar"></i> Dollar Price</label>
                <input type="number" step="0.01" class="form-control" name="dollar" value="{{ old('dollar', $customerSale->dollar) }}">
                @error('dollor') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Afghani Price -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-currency-afghani"></i> Afghani Price</label>
                <input type="number" step="0.01" class="form-control" name="afghani" value="{{ old('afghani', $customerSale->afghani) }}">
                @error('afghani') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Kaldar Price -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-currency-exchange"></i> Kaldar Price</label>
                <input type="number" step="0.01" class="form-control" name="kaldar" value="{{ old('kaldar', $customerSale->kaldar) }}">
                @error('kaldar') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-chat-left-dots"></i> Description</label>
                <textarea class="form-control" name="description" rows="3">{{ old('description', $customerSale->description) }}</textarea>
                @error('description') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Submit -->
            <div class="text-center mt-4">
                <button class="btn btn-success px-5">
                    <i class="bi bi-arrow-repeat"></i> Update Sale
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
