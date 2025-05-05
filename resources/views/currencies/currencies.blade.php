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

        <!-- Search -->
        <div class="col-md-4 col-sm-8 mt-3">
          <form id="searchForm" method="GET" action="{{ route('currency.index') }}" class="search-form d-flex">
            <input type="text" class="form-control me-2" placeholder="Search by name..." name="name" value="{{ request('name') }}">
            <button class="btn btn-primary me-2" type="submit"><i class="fa fa-search"></i></button>
            <button class="btn btn-secondary" type="button" id="clearBtn" style="display: none;"><i class="fa fa-times"></i></button>
          </form>
        </div>

        <!-- Add Product -->
        <div class="col-md-4 col-sm-4 mt-3 text-end">
          <a href="{{ route('currency.create') }}" class="btn btn-success btn-sm rounded-pill">➕ Add Currency</a>
        </div>
      </div>

      <!-- Table -->
      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-nowrap">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Currency Name</th>
              <th>Description</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($currencies as $currency)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $currency->currency_name }}</td>
              <td>{{ $currency->currency_description }}</td>
              <td>
                <div class="d-flex gap-2">
                  <a href="{{ route('currency.show', $currency->id) }}" class="text-info"><i class="fa fa-eye"></i></a>
                  <a href="{{ route('currency.edit', $currency->id) }}" class="text-warning"><i class="fa fa-edit"></i></a>
                  <a href="#" class="text-danger delete" data-id="{{ $currency->id }}"><i class="fa fa-trash"></i></a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-3">
        {{ $currencies->links('pagination::bootstrap-5') }}
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
        text: 'This will be deleted permanently!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: '/currency/' + id,
            type: 'DELETE',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function() {
              Swal.fire('Deleted!', 'The product has been deleted.', 'success').then(() => location.reload());
            },
            error: function() {
              Swal.fire('Error', 'Something went wrong.', 'error');
            }
          });
        }
      });
    });

    const searchInput = document.querySelector('input[name="name"]');
    const clearBtn = document.getElementById('clearBtn');

    searchInput.addEventListener('input', function () {
      clearBtn.style.display = this.value ? 'inline-block' : 'none';
    });

    clearBtn.addEventListener('click', function () {
      searchInput.value = '';
      document.getElementById('searchForm').submit();
    });
  </script>
</div>
@endsection
