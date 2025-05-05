@extends('layouts.app')
@section('content')
<style>
  .form-wrapper {
    max-width: 900px;
    margin: 50px auto;
  }
</style>
<div class="container">
  @include('layouts.page_header')
  <div class="row">
    <div class="form-wrapper card p-4 shadow-sm  col-md-10 h-100">
      <h4 class="text-center mb-4">🏬 Add Branch</h4>


      <form action="{{ route('branch.update',$branches->id) }}" method="POST" >
        @method('PUT')
        @csrf
        <!-- Branch Name -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-building"></i> Branch Name</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-building-fill"></i></span>
            <input type="text" class="form-control" name="name" placeholder="Enter branch name" required value="{{ $branches->name }}">
          </div>
          @error('name')
          <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>

        <!-- Branch Address -->
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-geo-alt"></i> Address</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
            <input type="text" class="form-control" name="address" placeholder="Enter address" value="{{$branches->address }}">
          </div>
          @error('address')
          <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        </div>

        <!-- Submit -->
        <div class="text-center mt-4">
          <button class="btn btn-primary px-5">
            <i class="bi bi-save"></i> Save Branch
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
  @endsection
