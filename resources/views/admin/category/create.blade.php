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
    <h3 class="card-header">Category
        <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm float-end"> Back </a>
    </h3>
    <div class="card-body">
        <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="row">

              <div class="form-group col-md-6">
                <label for="">Name</label>
                <input type="text"  name="name" class="form-control" >
              </div>
              <div class="form-group col-md-6">
                <label for="">Slug</label>
                <input type="text" name="slug" class="form-control" id="inputPassword4">
              </div>
            </div>

            <div class="form-group">
              <label for="">Description</label>
             <textarea name="description" rows="3" class="form-control"></textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                  <label > Image</label>
                  <input type="file" class="form-control" name="image" >
                </div>
                <div class="form-group col-md-6">
                    <label >Status</label><br>
                    <input  type="checkbox" name="status">
                </div>
            </div>
            <div class="col-md-12">
                <h4>SEO Tags</h4>
            </div>
            <div class="form-group col-md-12">
                <label >Meta Title</label>
                <input type="text" name="meta_title" class="form-control">
            </div>

            <div class="form-group col-md-12">
                <label >Meta Keyword</label>
                <input type="text" name="meta_keyword" class="form-control">
            </div>

            <div class="form-group col-md-12">
                <label >Meta Description</label>
                <textarea name="meta_description"  rows="3" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
          </form>
    </div>
  </div>
@endsection