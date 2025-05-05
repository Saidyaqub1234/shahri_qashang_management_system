@extends('layouts.app')

@section('content')

<!-- Include Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    .company-card {
        background: #ffffff;
        border-radius: 1rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        padding: 2rem;
    }

    .company-header {
        border-bottom: 2px solid #eee;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        text-align: center;
    }

    .company-header h3 {
        font-weight: bold;
        color: #0d6efd;
    }

    .company-info p {
        margin-bottom: 0.75rem;
        font-size: 1rem;
    }

    .company-info i {
        width: 24px;
        text-align: center;
        color: #0d6efd;
        margin-right: 0.5rem;
    }

    .company-info strong {
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
            <div class="company-card">
                <div class="company-header">
                    <h3><i class="bi bi-building"></i> {{ $company->name }}</h3>
                    <p class="text-muted">Company Profile</p>
                </div>

                <div class="company-info">
                    <p><i class="bi bi-hash"></i> <strong>ID:</strong> {{ $company->id }}</p>
                    <p><i class="bi bi-person-badge"></i> <strong>Name:</strong> {{ $company->name }}</p>
                    <p><i class="bi bi-telephone-fill"></i> <strong>Phone:</strong> {{ $company->phone }}</p>
                    <p><i class="bi bi-envelope-at"></i> <strong>Email:</strong> {{ $company->email }}</p>
                    <p><i class="bi bi-geo-alt-fill"></i> <strong>Country:</strong> {{ $company->country }}</p>
                    <p><i class="bi bi-map-fill"></i> <strong>Address:</strong> {{ $company->address }}</p>
                    <p><i class="bi bi-currency-dollar"></i> <strong>Dollar Account:</strong> {{ $company->dollor_account }}</p>
                    <p><i class="bi bi-cash-coin"></i> <strong>Afghani Account:</strong> {{ $company->afghani_account }}</p>
                    <p><i class="bi bi-currency-exchange"></i> <strong>Kaldar Account:</strong> {{ $company->kaldar_account }}</p>
                    <p><i class="bi bi-card-text"></i> <strong>Description:</strong> {{ $company->description }}</p>
                    <p><i class="bi bi-calendar-event"></i> <strong>Created At:</strong> {{ $company->created_at->format('Y-m-d h:i A') }}</p>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('admin.companies') }}" class="btn btn-custom"><i class="bi bi-arrow-left-circle"></i> Back to Companies</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
