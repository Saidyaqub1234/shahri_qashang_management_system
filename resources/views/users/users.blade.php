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

</style>
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
          <form id="searchForm" method="GET" action="{{ route('user.index') }}" class="search-form d-flex">
            <input type="text" class="form-control me-2" placeholder="Search by branch..." name="name" value="{{request('name') }}">
            <button class="btn btn-primary me-2" type="submit"><i class="fa fa-search"></i></button>
            <button class="btn btn-secondary" type="button" id="clearBtn" style="display: none;"><i class="fa fa-times"></i></button>
          </form>
        </div>

        <!-- Add Entry -->
        @if (Auth::user()->type=='admin')
        <div class="col-md-4 col-sm-4 mt-3 text-end">
          <a href="{{ route('user.create') }}" class="btn btn-success btn-sm rounded-pill">➕ Add User</a>
        </div>
        @endif
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
              {{-- <th>Password</th> --}}
              <th>Status</th>
              <th>Role</th>
              @if (Auth::user()->type=='admin')
              <th>Make Admin</th>
              <th>Actions</th>
              @endif
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td><img class="show-image" src="{{asset('uploads/'.$user->image) }}" alt=""></td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->phone}}</td>
              {{-- <td>{{ {!! Form::password($user->password, [$password]) !!}</td> --}}
              <td>{{ $user->status }}</td>
              <td>{{ $user->type }}</td>
              @if (Auth::user()->type=='admin')
              <td class="py-2 px-4">
                 <form action="{{ route('user.toggle-role',$user->id) }}" method="POST" >
                    @csrf
                    <label class="switch">
                        <input onchange="this.form.submit()" type="checkbox" name="type" {{($user->type==='admin')?'checked':''}}>
                        <span class="slider"></span>
                      </label>
                </form>
              </td>

              {{-- <td>{{ \Carbon\Carbon::parse($user->date)->format('Y-m-d') }}</td> --}}
              <td>
                <div class="d-flex gap-2">
                  <a href="{{ route('user.show',$user->id) }}" class="text-info"><i class="fa fa-eye"></i></a>
                  <a href="{{ route('user.edit',$user->id) }}" class="text-warning"><i class="fa fa-edit"></i></a>
                  <a href="#" class="text-danger userDelete" id="{{ $user->id }}" data-id="{{ $user->id }}"><i class="fa fa-trash"></i></a>
                </div>
              </td>
              @endif
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-3">
        {{ $users->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).on('click', '.userDelete', function(e) {
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
            url: '/user/' + id,
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
