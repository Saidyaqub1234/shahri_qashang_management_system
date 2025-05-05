@extends('layouts.app')

@section('content')

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    .branch-store-card {
        background: #ffffff;
        border-radius: 1rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        padding: 2rem;
    }

    .branch-store-header {
        border-bottom: 2px solid #eee;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        text-align: center;
    }

    .branch-store-header h3 {
        font-weight: bold;
        color: #0d6efd;
    }

    .branch-store-info p {
        margin-bottom: 0.75rem;
        font-size: 1rem;
    }

    .branch-store-info i {
        width: 24px;
        text-align: center;
        color: #0d6efd;
        margin-right: 0.5rem;
    }

    .branch-store-info strong {
        width: 160px;
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
            <div class="branch-store-card">
                <div class="branch-store-header">
                    <h3><i class="bi bi-box"></i> {{ $branchStore->product->name }}</h3>
                    <h3><i class="bi bi-box"></i> {{ $branchStore->branch->name }}</h3>


                    <p class="text-muted"><i class="bi bi-calendar-check-fill"></i> Date: {{ \Carbon\Carbon::parse($branchStore->date)->format('Y-m-d') }}</p>
                </div>

                <div class="branch-store-info">
                    <p><i class="bi bi-hash"></i> <strong>ID:</strong> {{ $branchStore->id }}</p>
                    <p><i class="bi bi-building"></i> <strong>Branch Name:</strong> {{ $branchStore->branch->name }}</p>
                    <p><i class="bi bi-box"></i> <strong>Product Name:</strong> {{ $branchStore->product->name }}</p>
                    <p><i class="bi bi-building-fill"></i> <strong>Company Name:</strong> {{ $branchStore->company->name }}</p>
                    <p><i class="bi bi-123"></i> <strong>Product In Count:</strong> {{ $branchStore->product_in_count }}</p>
                    <p><i class="bi bi-currency-dollar"></i> <strong>Product Price:</strong> ${{ number_format($branchStore->price, 2) }}</p>
                    <p><i class="bi bi-calculator"></i> <strong>Total Price:</strong> ${{ number_format($branchStore->total_price, 2) }}</p>
                    <p><i class="bi bi-chat-left-text"></i> <strong>Description:</strong> {{ $branchStore->description ?? 'No description provided' }}</p>
                    <p><i class="bi bi-calendar-check"></i> <strong>Created At:</strong> {{ $branchStore->created_at->format('Y-m-d h:i A') }}</p>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('branch-store.index') }}" class="btn btn-custom">
                        <i class="bi bi-arrow-left-circle"></i> Go Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
