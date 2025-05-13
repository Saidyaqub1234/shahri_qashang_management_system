@extends('layouts.app')

@section('content')
<div class="main-content-inner mt-5 container-fluid">
  <div class="main-content-wrap">
    <div class="wg-box">
      <div class="row align-items-center mb-4">

        <!-- Page Header -->
        <div class="col-md-4 col-sm-12 mt-5">
          @include('layouts.page_header', ['title' => 'Customer Sales'])
        </div>

        <!-- Search -->
       <!-- Search by Product Type -->
        <div class="col-md-4 col-sm-8 mt-3">
            <form id="searchForm" method="GET" action="{{ route('sales.index') }}" class="search-form d-flex">
            <input type="text" class="form-control me-2" placeholder="Search by product type..." name="product_type" value="{{ request('product_type') }}">
            <button class="btn btn-primary me-2" type="submit"><i class="fa fa-search"></i></button>
            <button class="btn btn-secondary" type="button" id="clearBtn" style="display: none;"><i class="fa fa-times"></i></button>
            </form>
        </div>

        <!-- Add Sale -->
        <div class="col-md-4 col-sm-4 mt-2 text-end">
          <a href="{{ route('sales.create') }}" class="btn btn-success btn-sm rounded-pill">➕ Add Customer Sale</a>
        </div>
      </div>

      <!-- Table -->
      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Bill Number</th>
              <th>Customer</th>
              <th>Product Type</th>
              <th>Currency</th>
              <th>Sale Count</th>
              <th>Sale Price</th>

              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($customerSales as $sale)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $sale->bill_number }}</td>
              <td>{{ $sale->customer->name ?? '-' }}</td>
              <td>{{ $sale->product_type->name }}</td>
              <td>{{ $sale->currency->currency_name }}</td>
              <td>{{ $sale->sale_count }}</td>
              <td>{{ number_format($sale->price, 2) }}</td>
              <td>
                <div class="d-flex gap-2">
                  <a href="{{ route('sales.show', $sale->id) }}" class="text-info"><i class="fa fa-eye"></i></a>
                  <a href="{{ route('sales.edit', $sale->id) }}" class="text-warning"><i class="fa fa-edit"></i></a>
                  <a href="#" class="text-danger delete" data-id="{{ $sale->id }}"><i class="fa fa-trash"></i></a>
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="10" class="text-center text-muted">No customer sales found.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-3">
        {{ $customerSales->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).on('click', '.delete', function(e) {
      e.preventDefault();
      const id = $(this).data('id');

      Swal.fire({
        title: 'Are you sure?',
        text: 'This sale will be permanently deleted!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: 'sales/' + id,
            type: 'DELETE',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function() {
              Swal.fire('Deleted!', 'Customer sale has been deleted.', 'success').then(() => location.reload());
            },
            error: function() {
              Swal.fire('Error', 'Something went wrong.', 'error');
            }
          });
        }
      });
    });

    const searchInput = document.querySelector('input[name="product_type"]');
    const clearBtn = document.getElementById('clearBtn');

    searchInput.addEventListener('input', function () {
      clearBtn.style.display = this.value ? 'inline-block' : 'none';
    });

    clearBtn.addEventListener('click', function () {
      searchInput.value = '';
      document.getElementById('searchForm').submit();
    });
  </script>

  <!-- Font Size Styling -->

</div>
@endsection
