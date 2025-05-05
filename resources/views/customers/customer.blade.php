@extends('layouts.app')

@section('content')
<div class="main-content-inner mt-5 container-fluid">
    <div class="main-content-wrap">
        <div class="wg-box">
            <div class="row align-items-center mb-4">

                <!-- Page Header -->
                <div class="col-md-4 col-sm-12 mt-5">
                    @include('layouts.page_header')
                </div>

                <!-- Search Form -->
                <div class="col-md-4 col-sm-8 mt-3">
                    <form id="searchForm" class="d-flex" method="GET" action="{{ route('customer.index') }}">
                        <input type="text" class="form-control me-2" placeholder="Search by name..."
                            name="name" id="searchInput" value="{{ request('name') }}">
                        <button class="btn btn-primary me-2" type="submit" id="searchBtn">
                            <i class="fa fa-search"></i>
                        </button>
                        <button class="btn btn-secondary" type="button" id="clearBtn" style="display: none;">
                            <i class="fa fa-times"></i>
                        </button>
                    </form>
                </div>

                <!-- Add Branch Button -->
                <div class="col-md-4 col-sm-4 mt-3 text-end">
                    <a href="{{ route('branch.create') }}" class="btn btn-success btn-sm rounded-pill">➕ Add Branch</a>
                </div>
            </div>

            <!-- Responsive Table -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle text-nowrap">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Father Name</th>
                            <th>phone</th>
                            <th>whatsapp </th>
                            <th>Dollar amount</th>
                            <th>Afghani amount</th>
                            <th>Kaldar amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>
                                <img class="show-image" src="{{asset('uploads/Customers/'.$customer->image) }}" alt="{{ $customer->name }}">
                            </td>

                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->lastName }}</td>
                            <td>{{ $customer->fatherName }}</td>

                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->whats_app }}</td>
                            <td>${{ $customer->dollor_amount }}</td>
                            <td>{{ $customer->afghani_amount }}Afghni</td>
                            <td>{{ $customer->kaldar_amount }}Rs</td>


                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('customer.show', $customer->id) }}" class="text-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('customer.edit', $customer->id) }}" class="text-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" class="text-danger Delete" data-id="{{ $customer->id }}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-3">
                {{ $customers->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).on('click', '.Delete', function(event) {
        event.preventDefault();
        let customerId = $(this).data('id');

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/customer/${customerId}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire("Deleted!", response.message, "success").then(() => {
                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        Swal.fire("Error", "There was a problem deleting.", "error");
                    }
                });
            }
        });
    });

    const searchInput = document.getElementById("searchInput");
    const clearBtn = document.getElementById("clearBtn");

    searchInput.addEventListener("input", function () {
        clearBtn.style.display = this.value.trim() !== "" ? "inline-block" : "none";
    });

    clearBtn.addEventListener("click", function () {
        searchInput.value = "";
        document.getElementById("searchForm").submit();
    });

    document.getElementById("searchBtn").addEventListener("click", function (event) {
        event.preventDefault();
        document.getElementById("searchForm").submit();
    });

    searchInput.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("searchBtn").click();
        }
    });
</script>
@endsection
