@extends('layouts.app')

@section('content')

<!-- Bootstrap Icons CDN -->
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> --}}

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
  border-radius: 17px; /* Make the slider rounded */
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
  border-radius: 50%; /* Make the circle rounded */
  transition: 0.4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:checked + .slider:before {
  transform: translateX(26px);
}
 svg{
    font-size: 6px;
 }
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
        <div class="col-md-10">

            <div class="branch-store-card shadow">
                <div class="row flex text-start ">
                    <div class="col-md-5 mt-3">
                    <img src="{{asset('uploads/'.$user->image)}} " alt="User Profile" class="w-16 h-16 rounded-full details-image">

                </div>
                <div class="col-md-3 p-3">
                    <h2 class="text-2xl font-semibold">{{ $user->name }}</h2>
                    <p>{{ $user->type }}</p>
                </div>
                    <div class="col-md-4 float-right text-end">
                        <h2 class="text-2xl font-semibold text-bold"> <strong>Change Status</strong></h2>
                        <strong>
                            <form action="{{route('user.toggle-status',$user->id)}} "  method="POST" >
                                @csrf

                                <label class="switch">
                                    <input onchange="this.form.submit()" type="checkbox" name="status" {{($user->status==='active')?'checked':''}}>
                                    <span class="slider"></span>
                                  </label>
                            </form>
                        </strong>


                    </div>
                    <hr>
                    <h3><u>User Details</u></h3>
                </div>

                <div class="branch-store-info">
                    <p><i class="bi bi-hash"></i> <strong>ID:</strong> {{ $user->id }}</p>
                    <p><i class="bi bi-account"></i> <strong>User Name:</strong> {{ $user->name }}</p>
                    <p><i class="bi bi-building-fill"></i> <strong>User Email:</strong> {{ $user->email }}</p>
                    <p><i class="bi bi-123"></i> <strong>Phone:</strong> {{ $user->phone }}</p>
                    <p><i class="bi bi-currency-dollar"></i> <strong>Status:</strong> {{$user->status }}</p>
                    <p><i class="bi bi-calculator"></i> <strong>User Role:</strong>{{$user->type }}</p>
                    <p><i class="bi bi-calendar-check"></i> <strong>Created At:</strong> {{ $user->created_at->format('Y-m-d h:i A') }}</p>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('user.index') }}" class="btn btn-custom">
                        <i class="bi bi-arrow-left-circle"></i> Go Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
