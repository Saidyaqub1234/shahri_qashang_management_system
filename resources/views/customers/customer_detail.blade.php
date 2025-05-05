@extends('layouts.app')

@section('content')

<style>
    .branch-store-card {
        background: #ffffff;
        border-radius: 1rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        transition: 0.3s ease-in-out;
    }

    .branch-store-header {
        text-align: center;
        border-bottom: 1px solid #e3e3e3;
        padding-bottom: 1rem;
        margin-bottom: 2rem;
    }

    .branch-store-header h3 {
        font-weight: 700;
        color: #0d6efd;
    }

    .details-image {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #0d6efd;
        margin-bottom: 1rem;
    }

    .branch-store-info p {
        font-size: 1.05rem;
        margin-bottom: 0.75rem;
    }

    .branch-store-info strong {
        width: 160px;
        display: inline-block;
        color: #333;
    }

    .branch-store-info i {
        color: #0d6efd;
        margin-right: 0.5rem;
    }

    .btn-custom {
        background-color: #0d6efd;
        color: white;
        padding: 0.6rem 1.8rem;
        border-radius: 0.5rem;
        transition: background 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #084298;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="branch-store-card">
                <div class="branch-store-header">
                    <img src="{{ asset('uploads/Customers/'.$customer->image) }}" alt="Customer Profile" class="details-image">
                    <h3>👤 Customer Details</h3>
                </div>

                <div class="branch-store-info">
                    <p><i class="bi bi-hash"></i> <strong>ID:</strong> {{ $customer->id }}</p>
                    <p><i class="bi bi-person-badge-fill"></i> <strong>Name:</strong> {{ $customer->name }}</p>
                    <p><i class="bi bi-person"></i> <strong>Last Name:</strong> {{ $customer->lastName }}</p>
                    <p><i class="bi bi-person-bounding-box"></i> <strong>Father Name:</strong> {{ $customer->fatherName }}</p>
                    <p><i class="bi bi-telephone-fill"></i> <strong>Phone:</strong> {{ $customer->phone }}</p>
                    <p><i class="bi bi-whatsapp"></i> <strong>WhatsApp:</strong> {{ $customer->whats_app }}</p>
                    <p><i class="bi bi-currency-dollar"></i> <strong>Dollar Amount:</strong> {{ $customer->dollor_amount }}</p>
                    <p><i class="bi bi-cash-coin"></i> <strong>Afghani Amount:</strong> {{ $customer->afghani_amount }}</p>
                    <p><i class="bi bi-wallet2"></i> <strong>Kaldar Amount:</strong> {{ $customer->kaldar_amount }}</p>
                    <p><i class="bi bi-calendar-check"></i> <strong>Created At:</strong> {{ $customer->created_at->format('Y-m-d h:i A') }}</p>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('customer.index') }}" class="btn btn-custom">
                        <i class="bi bi-arrow-left-circle"></i> Go Back
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
