@extends('layouts.admin')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card">
    <h3 class="card-header">Edit Category
        <a href="{{ url('admin/category') }}" class="btn btn-primary btn-sm float-end"> Back </a>
    </h3>
    <div class="card-body">
        <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
           <div class="row">

              <div class="form-group col-md-6">
                <label for="">Name</label>
                <input type="text"  name="name" class="form-control" value="{{ $category->name }}">
              </div>
              <div class="form-group col-md-6">
                <label for="">Slug</label>
                <input type="text" name="slug" class="form-control" value="{{ $category->slug }}">
              </div>
            </div>

            <div class="form-group">
              <label for="">Description</label>
             <textarea name="description" rows="3" class="form-control" >{{ $category->description }}</textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                  <label > Image</label>
                  <input type="file" class="form-control" >
                  
                  <img src="{{ asset('uploads/category/'.$category->image) }}" alt="" width="60px" height="60px">
                </div>
                <div class="form-group col-md-6">
                    <label >Status</label><br>
                    <input  type="checkbox" name="status" {{ $category->status=='1'?'checked':'' }}>
                </div>
            </div>
            <div class="col-md-12">
                <h4>SEO Tags</h4>
            </div>
            <div class="form-group col-md-12">
                <label >Meta Title</label>
                <input type="text" name="meta_title" class="form-control" value="{{ $category->meta_title }}">
            </div>

            <div class="form-group col-md-12">
                <label >Meta Keyword</label>
                <input type="text" name="meta_keyword" class="form-control" value="{{ $category->meta_keyword }}">
            </div>

            <div class="form-group col-md-12">
                <label >Meta Description</label>
                <textarea name="meta_description"  rows="3" class="form-control" >{{ $category->meta_description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
          </form>
    </div>
  </div>
@endsection