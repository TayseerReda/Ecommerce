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
    <h3 class="card-header">Sliders
        <a href="{{ url('admin/slider') }}" class="btn btn-primary btn-sm float-end"> Back </a>
    </h3>
    <div class="card-body">
        <form action="{{ url('admin/slider') }}" method="POST" enctype="multipart/form-data">
            @csrf
       

              <div class="form-group col-md-6">
                <label for="">Title</label>
                <input type="text"  name="title" class="form-control" >
              </div>
           
            

            <div class="form-group">
              <label for="">Description</label>
             <textarea name="description" rows="3" class="form-control"></textarea>
            </div>
   
                <div class="form-group col-md-6">
                  <label > Image</label>
                  <input type="file" class="form-control" name="image" >
                </div>
                <div class="form-group col-md-6">
                    <label >Status</label><br>
                    <input  type="checkbox" name="status">
                </div>
           
      

            <button type="submit" class="btn btn-primary">Save</button>
          </form>
    </div>
  </div>
@endsection