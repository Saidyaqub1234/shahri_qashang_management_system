@extends('layouts.app')
@section('content')

<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }

    .switch input {
        display: none;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        border-radius: 17px;
        transition: 0.4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        border-radius: 50%;
        transition: 0.4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:checked + .slider:before {
        transform: translateX(26px);
    }
</style>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="bg-white shadow-md rounded-lg p-4 w-100" style="max-width: 600px;">
        <div class="text-center">
            <h3 class="card-title mb-1"><i class="bi bi-box-seam"></i> {{ $product->name }}</h3>
        </div>

        <hr>

        <div>
            <h5 class="font-semibold text-primary"><i class="bi bi-info-circle-fill"></i> Product Details</h5>
            <p><strong><i class="bi bi-hash"></i> ID:</strong> {{ $product->id }}</p>
            <p><strong><i class="bi bi-type"></i> Name:</strong> {{ $product->name }}</p>
            <p><strong><i class="bi bi-card-text"></i> Description:</strong> {{ $product->description }}</p>
            <p><strong><i class="bi bi-calendar-event"></i> Created At:</strong> {{ $product->created_at->format('Y-m-d h:i A') }}</p>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('product-type.index') }}" class="btn btn-primary">
                <i class="bi bi-arrow-left-circle"></i> Go Back
            </a>
        </div>
    </div>
</div>

@endsection
