@extends('layouts.admin')
@section('content')
@if (session('message'))
<div>

    <div class="alert alert-success">
        {{ session('message') }}
    </div>
  @endif
  <div class="card">
      <h3 class="card-header">Product List
          <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm float-end" > Add product</a>
          {{-- <button type="button"  class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addBrandModal"> --}}
              {{-- Add Product --}}
            </button>
      </h3>
      <div class="card-body">
      </div>
</div>

@endsection