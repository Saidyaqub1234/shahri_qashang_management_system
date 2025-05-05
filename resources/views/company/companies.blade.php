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
          <form id="searchForm" method="GET" action="{{ route('company.index') }}" class="search-form d-flex">
            <input type="text" class="form-control me-2" placeholder="Search by name..." name="name" value="{{ request('name') }}">
            <button class="btn btn-primary me-2" type="submit"><i class="fa fa-search"></i></button>
            <button class="btn btn-secondary" type="button" id="clearBtn" style="display: none;"><i class="fa fa-times"></i></button>
          </form>
        </div>

        <!-- Add Company -->
        <div class="col-md-4 col-sm-4 mt-3 text-end">
          <a href="{{ route('company.create') }}" class="btn btn-success btn-sm rounded-pill">➕ Add Company</a>
        </div>
      </div>

      <!-- Table -->
      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-nowrap">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Country</th>
              <th>Address</th>
              <th>Dollar</th>
              <th>Afghani</th>
              <th>Kaldar</th>
              <th>Description</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($companies as $company)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $company->name }}</td>
              <td>{{ $company->phone }}</td>
              <td>{{ $company->email }}</td>
              <td>{{ $company->country }}</td>
              <td>{{ $company->address }}</td>
              <td>{{ $company->dollor_account }}</td>
              <td>{{ $company->afghani_account }}</td>
              <td>{{ $company->kaldar_account }}</td>
              <td class="limit-width">{{ $company->description }}</td>
              <td>
                <div class="d-flex gap-2">
                  <a href="{{ route('company.show', $company->id) }}" class="text-info"><i class="fa fa-eye"></i></a>
                  <a href="{{ route('company.edit', $company->id) }}" class="text-warning"><i class="fa fa-edit"></i></a>
                  <a href="#" class="text-danger delete" data-id="{{ $company->id }}"><i class="fa fa-trash"></i></a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-3">
        {{ $companies->links('pagination::bootstrap-5') }}
      </div>
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
          url: '/company/' + id,
          type: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function() {
            Swal.fire('Deleted!', 'Company has been deleted.', 'success').then(() => location.reload());
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
@endsection
