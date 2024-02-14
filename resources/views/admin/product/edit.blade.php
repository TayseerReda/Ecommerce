@extends('layouts.admin')
@section('content')
@if (session('message'))
<div>

    <div class="alert alert-success">
        {{ session('message') }}
    </div>
  @endif
  <div class="card">
      <h3 class="card-header">Add Product 
          <a href="{{ url('admin/products') }}" class="btn btn-primary btn-sm float-end" data-bs-target="#addBrandModal">Back</a>
          {{-- <button type="button"  class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addBrandModal"> --}}
              {{-- Add Product --}}
            </button>
      </h3>
      <div class="card-body">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ url('admin/product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                Home</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                SEO Tags</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                Details</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                Product Image</button>
            </li>
            
          </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane border p-4 fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="mb-3">
                    <label for="">Category</label>
                    <select name="category_id"  class="form-control">
                        @foreach ($category as $category )
                        <option value="{{ $category->id }}" {{ $product->category_id== $category->id ? 'selected' : '' }} >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="">Product Name</label>
                    <input type="text" name="name" class="form-control" value="{{$product->name }}">
                </div>

                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ $product->slug }}">
                </div>

                <div class="mb-3">
                    <label for="">Brand</label>
                    <select name="brand" id="" class="form-control">
                        @foreach ($brand as $brand )
                        <option value="{{$brand->name}}"  {{ $product->brand == $brand->name ? 'selected':'' }}>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="">Small Description</label>
                    <textarea name="small_description"  rows="3" class="form-control" value="{{ $product->small_description }}"></textarea>
                </div>

                <div class="mb-3">
                    <label for=""> Description</label>
                    <textarea name="description"  rows="3" class="form-control" value="{{ $product->description }}"></textarea>
                </div>
            </div>
            
            
            <div class="tab-pane border p-4 fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                
                <div class="mb-3">
                    <label for=""> Meta Title</label>
                    <textarea name="meta_title"  rows="3" class="form-control" value="{{ $product->meta_title }}"></textarea>
                </div>
                <div class="mb-3">
                    <label for=""> Meta Description</label>
                    <textarea name="meta_description"  rows="3" class="form-control" value="{{ $product->meta_description }}"></textarea>
                </div>
                <div class="mb-3">
                    <label for=""> Meta Keyword</label>
                    <textarea name="meta_keyword"  rows="3" class="form-control" value="{{ $product->meta_keyword }}"></textarea>
                </div>
                
            </div>
            
            <div class="tab-pane border p-4 fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="">Original Price</label>
                            <input type="text" name="original_price" class="form-control" value="{{ $product->original_price }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="">Selling Price</label>
                            <input type="text" name="selling_price" class="form-control" value="{{ $product->selling_price }}">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="">Quantity</label>
                            <input type="text" name="quantity" class="form-control" value="{{ $product->quantity }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="">Trending</label>
                            <input type="checkbox" name="trending"  style="width:50px ;height:50px;" {{ $product->trending=='1'?'checked':''}}>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status"  style="width:50px ;height:50px;" {{ $product->status=='1'?'checked':''}}>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="tab-pane border p-4 fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                <div class="mb-3">
                    <input type="file" name="image[]"  multiple class="form-control">
                </div>
                <div class="mt-4">
                    <div class="row">
    
                        @foreach ($product->productImages as $image)
                        
                            <div class="col-md-2">
                               
                                <img src="{{ asset('uploads/product/'.$image->image) }}" alt="" style="width: 80px;hight:80px"><br>
                                <a href="{{ url('admin/product_image/'.$image->id.'/delete') }}">Remove Image</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
        </div>
            
        </div>

          </form>
      </div>
    </div>
    
    @endsection