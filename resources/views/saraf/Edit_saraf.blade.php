@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.page_header')
    <div class="form-wrapper card p-4 shadow-sm">

        <h4 class="text-center mb-4">🏦 Add Saraf</h4>

        <form action="{{ route('saraf.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Saraf Name -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-person-badge"></i> Saraf Name</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" name="saraf_name" placeholder="Enter saraf name" required>
                </div>
                @error('saraf_name') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Saraf Phone -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-telephone"></i> Phone</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-phone"></i></span>
                    <input type="text" class="form-control" name="saraf_phone" placeholder="Enter phone number" required>
                </div>
                @error('saraf_phone') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Saraf Email -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-envelope"></i> Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                    <input type="email" class="form-control" name="saraf_email" placeholder="Enter email address">
                </div>
                @error('saraf_email') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Shop Number -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-shop"></i> Shop Number</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-123"></i></span>
                    <input type="text" class="form-control" name="saraf_shop_number" placeholder="Enter shop number">
                </div>
                @error('saraf_shop_number') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-geo-alt"></i> Address</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-geo"></i></span>
                    <input type="text" class="form-control" name="saraf_address" placeholder="Enter address">
                </div>
                @error('saraf_address') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Image -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-image"></i> Saraf Image</label>
                <div class="input-group">
                    <input type="file" class="form-control" name="saraf_image">
                </div>
                @error('saraf_image') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-chat-left-text"></i> Description</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-info-circle"></i></span>
                    <textarea class="form-control" name="saraf_description" rows="3" placeholder="Optional description"></textarea>
                </div>
                @error('saraf_description') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Submit -->
            <div class="text-center mt-4">
                <button class="btn btn-primary px-5">
                    <i class="bi bi-save2"></i> Save Saraf
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
