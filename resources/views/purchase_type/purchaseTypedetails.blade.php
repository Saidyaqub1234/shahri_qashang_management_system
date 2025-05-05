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
            <h3 class="card-title mb-1">{{ $purchase_Type->name }}</h3>
            {{-- <p class="text-muted">{{ $product-> }}</p> --}}
        </div>

        <hr>

        <div>
            <h5 class="font-semibold text-primary">Purchase  Details</h5>
            <p><strong>ID:</strong> {{ $purchase_Type->id }}</p>
            <p><strong>Name:</strong> {{ $purchase_Type->name }}</p>
            <p><strong>Description:</strong> {{ $purchase_Type->description }}</p>
            <p><strong>Created At:</strong> {{ $purchase_Type->created_at->format('Y-m-d h:i A') }}</p>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('purchase_type.index') }}" class="btn btn-primary">Go Back</a>
        </div>
    </div>
</div>

@endsection

