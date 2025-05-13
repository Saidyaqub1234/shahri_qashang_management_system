@extends('layouts.app')

@section('content')

<!-- Include Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    .saraf-card {
        background: #ffffff;
        border-radius: 1rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        padding: 2rem;
    }

    .saraf-header {
        border-bottom: 2px solid #eee;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        text-align: center;
    }

    .saraf-header h3 {
        font-weight: bold;
        color: #0d6efd;
    }

    .saraf-info p {
        margin-bottom: 0.75rem;
        font-size: 1rem;
    }

    .saraf-info i {
        width: 24px;
        text-align: center;
        color: #0d6efd;
        margin-right: 0.5rem;
    }

    .saraf-info strong {
        width: 180px;
        display: inline-block;
        color: #333;
    }

    .saraf-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        margin: 1rem auto;
        display: block;
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
            <div class="saraf-card">
                <div class="saraf-header">
                    <h3><i class="bi bi-person-badge"></i> Saraf #{{ $saraf->id }}</h3>
                    <img src="{{ asset('uploads/saraf_images/'. $saraf->image) }}" alt="{{ $saraf->name }}" class="saraf-image">
                    <p class="text-muted">Saraf Information Details</p>
                </div>

                <div class="saraf-info">
                    <p><i class="bi bi-person-fill"></i> <strong>Name:</strong> {{ $saraf->name }}</p>
                    <p><i class="bi bi-envelope-fill"></i> <strong>Email:</strong> {{ $saraf->email }}</p>
                    <p><i class="bi bi-telephone-fill"></i> <strong>Phone:</strong> {{ $saraf->phone }}</p>
                    <p><i class="bi bi-shop"></i> <strong>Shop Number:</strong> {{ $saraf->shop_number }}</p>
                    <p><i class="bi bi-geo-alt-fill"></i> <strong>Address:</strong> {{ $saraf->address }}</p>
                    <p><i class="bi bi-card-text"></i> <strong>Description:</strong> {{ $saraf->description }}</p>
                    <p>
                        <i class="bi bi-calendar-event"></i>
                        <strong>Created At:</strong>
                        {{ $saraf->created_at ? $saraf->created_at->format('Y-m-d h:i A') : 'N/A' }}
                    </p>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('saraf.index') }}" class="btn btn-custom">
                        <i class="bi bi-arrow-left-circle"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
