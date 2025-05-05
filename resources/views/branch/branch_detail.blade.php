@extends('layouts.app')

@section('content')

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    .branch-card {
        background: #ffffff;
        border-radius: 1rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        padding: 2rem;
    }

    .branch-header {
        border-bottom: 2px solid #eee;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        text-align: center;
    }

    .branch-header h3 {
        font-weight: bold;
        color: #0d6efd;
    }

    .branch-info p {
        margin-bottom: 0.75rem;
        font-size: 1rem;
    }

    .branch-info i {
        width: 24px;
        text-align: center;
        color: #0d6efd;
        margin-right: 0.5rem;
    }

    .branch-info strong {
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
            <div class="branch-card">
                <div class="branch-header">
                    <h3><i class="bi bi-diagram-3"></i> {{ $branch->name }}</h3>
                    <p class="text-muted"><i class="bi bi-geo-alt-fill"></i> {{ $branch->address }}</p>
                </div>

                <div class="branch-info">
                    <p><i class="bi bi-hash"></i> <strong>ID:</strong> {{ $branch->id }}</p>
                    <p><i class="bi bi-diagram-3-fill"></i> <strong>Name:</strong> {{ $branch->name }}</p>
                    <p><i class="bi bi-geo-alt"></i> <strong>Address:</strong> {{ $branch->address }}</p>
                    <p><i class="bi bi-calendar-check"></i> <strong>Created At:</strong> {{ $branch->created_at->format('Y-m-d h:i A') }}</p>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('branch.index') }}" class="btn btn-custom">
                        <i class="bi bi-arrow-left-circle"></i> Go Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
