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

{{-- Font Awesome (if not already included globally) --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-nLCYMQxpxVv6Q0LPwr0E5RB+SCId1gghPt6nLKqz5QONQ1nkN+lYGvPK+eI1dDjAcwBVuXyyE4TV8m/szN12TQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="bg-white shadow-md rounded-lg p-4 w-100" style="max-width: 600px;">
        <div class="text-center">
            <h3 class="card-title mb-1"><i class="fas fa-box"></i> Container Details</h3>
        </div>

        <hr>

        <div>
            <h5 class="font-semibold text-primary"><i class="fas fa-info-circle"></i> Container Info</h5>
            <p><i class="fas fa-hashtag text-secondary me-1"></i> <strong>ID:</strong> {{ $container->id }}</p>
            <p><i class="fas fa-cube text-secondary me-1"></i> <strong>Product:</strong> {{ $container->productType->name ?? 'N/A' }}</p>
            <p><i class="fas fa-building text-secondary me-1"></i> <strong>Company:</strong> {{ $container->company->name ?? 'N/A' }}</p>
            <p><i class="fas fa-layer-group text-secondary me-1"></i> <strong>Item Count:</strong> {{ $container->item_count }}</p>
            <p><i class="fas fa-dollar-sign text-secondary me-1"></i> <strong>Price:</strong> {{ $container->price }}</p>
            <p><i class="fas fa-coins text-secondary me-1"></i> <strong>Total Purchase Price:</strong> {{ $container->total_purchase_price }}</p>
            <p><i class="fas fa-align-left text-secondary me-1"></i> <strong>Description:</strong> {{ $container->description }}</p>
            <p><i class="fas fa-calendar-alt text-secondary me-1"></i> <strong>Created At:</strong> {{ $container->created_at->format('Y-m-d h:i A') }}</p>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('container.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Go Back</a>
        </div>
    </div>
</div>

@endsection
