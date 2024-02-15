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
    <h3 class="card-header">Edit Color
        <a href="{{ url('admin/colors') }}" class="btn btn-primary btn-sm float-end"> Back </a>
    </h3>
    <div class="card-body">
        <form action="{{ url('admin/color/'.$color->id) }}" method="POST">
            @csrf
            @method('PUT')
          

              <div class="form-group col-md-6">
                <label for="">Name</label>
                <input type="text"  name="name" class="form-control" value="{{ $color->name }}">
              </div>
              <div class="form-group col-md-6">
                <label for="">code</label>
                <input type="text"  name="code" class="form-control" value="{{ $color->code }}">
              </div>
            

     
                <div class="form-group col-md-6">
                    <label >Status</label><br>
                    <input  type="checkbox" name="status" {{ $color->status=='1'?'checked':'' }}>
                </div>
           
        

            <button type="submit" class="btn btn-primary">Update</button>
          </form>
    </div>
  </div>
@endsection