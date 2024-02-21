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
        <form action="{{ url('admin/slider/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
       

              <div class="form-group col-md-6">
                <label for="">Title</label>
                <input type="text"  name="title" value="{{ $slider->title }}" class="form-control" >
              </div>
           
            

            <div class="form-group">
              <label for="">Description</label>
             <textarea name="description" rows="3"  class="form-control"> {{ $slider->description }}</textarea>
            </div>
   
                <div class="form-group col-md-6">
                  <label > Image</label>
                  <input type="file" class="form-control" name="image" >
                  
                  <img src="{{ asset($slider->image) }}" alt="" style="width: 50px; hight:50px">
                </div>
                <div class="form-group col-md-6">
                    <label >Status</label><br>
                    <input  type="checkbox" name="status" {{ $slider->status=='1'?'checked':'' }}>
                </div>
           
      

            <button type="submit" class="btn btn-primary">Save</button>
          </form>
    </div>
  </div>
@endsection