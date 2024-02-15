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
          {{-- <button type="button"  class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addproductModal"> --}}
              {{-- Add Product --}}
            </button>
      </h3>
      <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Category</th>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
            
                </tr>
              </thead>
              <tbody>
                @foreach ( $products as $product )
                    
                <tr>
                  <th scope="row"> {{ $product->id }}</th>
                  <td> {{ $product->category->name }}</td>
                  <td> {{ $product->name }}</td>
                  <td> {{ $product->selling_price }}</td>
                  <td> {{ $product->quantity }}</td>
                  <td>{{  $product->status=='1'?'Hidden':'Visible' }}</td>
                

                  <td>
                    <a href="{{ url('/admin/product/' . $product->id . '/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ url('/admin/product/' . $product->id . '/delete') }}" onclick="return confirm('Are you sure you want to delete it?')" class="btn btn-danger btn-sm">Delete</a>

                  </td>
                </tr>
                @endforeach
         
              </tbody>

        </table>
      </div>
</div>

@endsection