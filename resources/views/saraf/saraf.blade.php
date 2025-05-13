@extends('layouts.app')

@section('content')
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 24px;
}
.switch input { display: none; }
.slider {
  position: absolute;
  cursor: pointer;
  top: 0; left: 0; right: 0; bottom: 0;
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
img.show-image {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  object-fit: cover;
}
</style>

<div class="main-content-inner mt-5 container-fluid">
  <div class="main-content-wrap">
    <div class="wg-box">
      <div class="row align-items-center mb-4">
        <div class="col-md-6 mt-5">
          <h4>Saraf List</h4>
        </div>
        <div class="col-md-6 mt-3 text-end">
          <a href="{{ route('saraf.create') }}" class="btn btn-success btn-sm rounded-pill">➕ Add Saraf</a>
        </div>
      </div>

      <!-- Table -->
      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-nowrap">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Image</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Shop No.</th>
              {{-- <th>Address</th>
              <th>Description</th> --}}
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($sarafs as $saraf)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>
                @if($saraf->image)
                  <img class="show-image" src="{{ asset('uploads/saraf_images/' . $saraf->image) }}" alt="{{ $saraf->name }}">
                @else
                  N/A
                @endif
              </td>
              <td>{{ $saraf->name }}</td>
              <td>{{ $saraf->email }}</td>
              <td>{{ $saraf->phone }}</td>
              <td>{{ $saraf->shop_number }}</td>
              {{-- <td>{{ $saraf->address }}</td>
              <td>{{ $saraf->description }}</td> --}}
              <td>
                <div class="d-flex gap-2">
                  <a href="{{ route('saraf.show', $saraf->id) }}" class="text-info"><i class="fa fa-eye"></i></a>
                  <a href="{{ route('saraf.edit', $saraf->id) }}" class="text-warning"><i class="fa fa-edit"></i></a>
                  <a href="#" class="text-danger delete" id="{{ $saraf->id }}" data-id="{{ $saraf->id }}"><i class="fa fa-trash"></i></a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-3">
        {{ $sarafs->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>
</div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
      $(document).on('click', '.delete', function(e) {
      e.preventDefault();
      const id = $(this).data('id');

    //   let deltetUrl='/branch-store/'+id;

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
            url: '/saraf/' + id,
            type: 'DELETE',
            dataType: 'json',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function() {
              Swal.fire('Deleted!', 'Entry has been deleted.', 'success').then(() => location.reload());
            },
            error: function() {
              Swal.fire('Error', 'Something went wrong.', 'error');
            }
          });
        }
      });
    });
</script>
@endsection
