@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.page_header')
    <div class="form-wrapper card p-4 shadow-sm">

        <h4 class="text-center mb-4">🏧 Add Saraf Withdrawal</h4>

        <form action="{{ route('saraf_widthraw_account.store') }}" method="POST">
            @csrf

            <!-- Bill Number -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-receipt-cutoff"></i> Bill Number</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-hash"></i></span>
                    <input type="text" class="form-control" name="bill_number" placeholder="Enter bill number" required>
                </div>
                @error('bill_number') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Saraf Selection -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-person-check-fill"></i> Select Saraf</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <select class="form-select" name="saraf_id" required>
                        <option value="">-- Choose Saraf --</option>
                        @foreach($sarafs as $saraf)
                            <option value="{{ $saraf->saraf_id }}">{{ $saraf->saraf_name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('saraf_id') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Dollar Account -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-currency-dollar"></i> Dollar Amount</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" step="0.01" class="form-control" name="dollor_account" placeholder="Withdraw in USD">
                </div>
                @error('dollor_account') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Afghani Account -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-cash-coin"></i> Afghani Amount</label>
                <div class="input-group">
                    <span class="input-group-text">؋</span>
                    <input type="number" step="0.01" class="form-control" name="afghani_account" placeholder="Withdraw in AFN">
                </div>
                @error('afghani_account') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Kaldar Account -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-currency-exchange"></i> Kaldar Amount</label>
                <div class="input-group">
                    <span class="input-group-text">₨</span>
                    <input type="number" step="0.01" class="form-control" name="kaldar_account" placeholder="Withdraw in PKR">
                </div>
                @error('kaldar_account') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-chat-text"></i> Description</label>
                <textarea class="form-control" name="description" rows="3" placeholder="Optional description"></textarea>
                @error('description') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Withdrawal Date -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-calendar-minus"></i> Withdrawal Date</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input type="date" class="form-control" name="widthraw_date" required>
                </div>
                @error('widthraw_date') <p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Submit -->
            <div class="text-center mt-4">
                <button class="btn btn-danger px-5">
                    <i class="bi bi-arrow-down-circle"></i> Save Withdrawal
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
