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
    <h3 class="card-header">Color
        <a href="{{ url('admin/colors') }}" class="btn btn-primary btn-sm float-end"> Back </a>
    </h3>
    <div class="card-body">
        <form action="{{ url('admin/color') }}" method="POST">
            @csrf
 

              <div class="form-group ">
                <label for="">Name</label>
                <input type="text"  name="name" class="form-control" >
              </div>

              <div class="form-group ">
                <label for="">Code</label>
                <input type="text"  name="code" class="form-control" >
              </div>
             
                <div class="form-group ">
                    <label >Status</label><br>
                    <input  type="checkbox" name="status" >
                </div>
           
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
    </div>
  </div>
@endsection