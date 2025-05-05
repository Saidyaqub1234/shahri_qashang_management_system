@extends('layouts.app')
@section('content')
<div class="main-content-inner mt-5">
    @include('layouts.page_header')
    <div class="main-content-wrap">

        <div class="wg-box">
          <div class="row">
            <div class="col-md-6 text-start mt-5 col-sm-6" >
              @include('layouts.page_header')
            </div>
            <div class="col-md-4 col-sm-6 wg-filter  mt-5 pt-2 text-end">
              <form class="form-search">
                  <fieldset class="name">
                      <input type="text" placeholder="Search here..." class="" name="name"
                          tabindex="2" value="" aria-required="true" required="">
                          <div class="button-submit d-inline text-start">
                            <button class="" type="submit"><i class="fa fa-search search-icon"></i>
                            </button>
                        </div> 
                  </fieldset>
                   
              </form>
              
          </div> 
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>SalePrice</th>
                            <th>SKU</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Featured</th>
                            <th>Stock</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
{{-- 
                            @foreach ($products as $product )
                            <tr> --}}

                            <td>#</td>
                            <td class="pname">
                                {{-- <div class="image">
                                    <img src="" alt="" class="image">
                                </div> --}}
                                <div class="name">
                                    <a href="#" class="body-title-2">name</a>
                                    {{-- <div class="text-tiny mt-3">slug</div> --}}
                                </div>
                            </td>
                            <td>123</td>
                            <td>123</td>
                            <td>123</td>
                            <td>123</td>
                            <td>123</td>
                            <td>123</td>
                            <td>123</td>
                            <td>123</td>
                            <td>
                                <div class="list-icon-function">
                                    <a href="#" target="_blank">
                                        <div class="item eye">
                                            <i class="icon-eye"></i>
                                        </div>
                                    </a>
                                    <a href="3">
                                        <div class="item edit">
                                            <i class="icon-edit-3">ed</i>
                                        </div>
                                    </a>

                                    <a href="" class="item text-danger productDelete" id="">
                                        <i class="icon-trash-2"></i>
                                    </a>

                                </div>
                            </td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>

            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                {{-- {{ $products->links("pagination::bootstrap-5") }} --}}

            </div>
        </div>
    </div>
</div>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).on('click', '.productDelete', function(event) {
        event.preventDefault(); // Prevent default behavior

        // / let brandid = $(this).data('id'); // Get the brand ID from data attribute
        let productid = $(this).attr('id').split('-')[1];
         console.log("Category ID:", productid); // Debugging
        let deleteUrl ='/admin/catagory/delete/'+productid;

        console.log("Deleting productDelete with ID:", productid);
        console.log("URL:", deleteUrl); // Debugging

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
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/admin/product/delete/'+productid,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        Swal.fire("Error", "There was a problem deleting the brand.", "error");
                    }
                });
            }
        });
    });
</script> --}}

@endsection
