@extends('layouts.app')

@section('content')

<!-- Include Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    .sale-card {
        background: #ffffff;
        border-radius: 1rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        padding: 2rem;
    }

    .sale-header {
        border-bottom: 2px solid #eee;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        text-align: center;
    }

    .sale-header h3 {
        font-weight: bold;
        color: #0d6efd;
    }

    .sale-info p {
        margin-bottom: 0.75rem;
        font-size: 1rem;
    }

    .sale-info i {
        width: 24px;
        text-align: center;
        color: #0d6efd;
        margin-right: 0.5rem;
    }

    .sale-info strong {
        width: 180px;
        display: inline-block;
        color: #333;
    }

    .btn-custom {
        background-color: #0d6efd;
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 0.5rem;
        transition: 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #084298;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="sale-card">
                <div class="sale-header">
                    <h3><i class="bi bi-receipt"></i> Sale #{{ $customerSale->id }}</h3>
                    <p class="text-muted">Customer Sale Details</p>
                </div>

                <div class="sale-info">
                    <p><i class="bi bi-hash"></i> <strong>Bill Number:</strong> {{ $customerSale->bill_number }}</p>
                    <p><i class="bi bi-bag"></i> <strong>Product Name:</strong> {{ $customerSale->product_type->name ?? '-' }}</p>
                    <p><i class="bi bi-currency-exchange"></i> <strong>Currency:</strong> {{ $customerSale->currency->currency_name ?? '-' }}</p>
                    <p><i class="bi bi-person"></i> <strong>Customer:</strong> {{ $customerSale->customer->name ?? '-' }}</p>
                    <p><i class="bi bi-building"></i> <strong>Branch:</strong> {{ $customerSale->branch->name ?? '-' }}</p>
                    <p><i class="bi bi-list-ol"></i> <strong>Sale Count:</strong> {{ $customerSale->sale_count }}</p>
                    <p><i class="bi bi-tag-fill"></i> <strong>Sale Price:</strong> {{ number_format($customerSale->price, 2) }}</p>
                    <p><i class="bi bi-currency-dollar"></i> <strong>Dollar Price:</strong> {{ number_format($customerSale->dollor, 2) }}</p>
                    <p><i class="bi bi-currency-afghani"></i> <strong>Afghani Price:</strong> {{ number_format($customerSale->afghani, 2) }}</p>
                    <p><i class="bi bi-currency-exchange"></i> <strong>Kaldar Price:</strong> {{ number_format($customerSale->kaldar, 2) }}</p>
                    <p><i class="bi bi-card-text"></i> <strong>Description:</strong> {{ $customerSale->description ?? 'N/A' }}</p>
                    <p>
                        <i class="bi bi-calendar-event"></i>
                        <strong>Created At:</strong>
                        {{ $customerSale->created_at ? $customerSale->created_at->format('Y-m-d h:i A') : 'N/A' }}
                    </p>


                <div class="text-center mt-4">
                    <a href="{{ route('sales.index') }}" class="btn btn-custom">
                        <i class="bi bi-arrow-left-circle"></i> Back to Sales
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
