@extends('layouts.admin')
@section('content')
@if (session('message'))
<div>

    <div class="alert alert-success">
        {{ session('message') }}
    </div>
  @endif
  <div class="card">
      <h3 class="card-header">Slider List
          <a href="{{ url('admin/slider/create') }}" class="btn btn-primary btn-sm float-end" > Add Slider</a>
        
            </button>
      </h3>
      <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Title</th>
                  <th scope="col">Description</th>
                  <th scope="col">Status</th>
                  <th scope="col">Image</th>
                  <th scope="col">Action</th>
            
                </tr>
              </thead>
              <tbody>
                @foreach ( $sliders as $slider )
                    
                <tr>
                  <th scope="row"> {{ $slider->id }}</th>
                  <td> {{ $slider->title }}</td>
                  <td> {{ $slider->description }}</td>
                  <td>{{  $slider->status=='1'?'Hidden':'Visible' }}</td>
                  
                  <td> <img src="{{ asset($slider->image) }}" alt="" style="width: 50px; hight:50px"> </td>
                

                  <td>
                    <a href="{{ url('/admin/slider/' . $slider->id . '/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ url('/admin/slider/' . $slider->id . '/delete') }}" onclick="return confirm('Are you sure you want to delete it?')" class="btn btn-danger btn-sm">Delete</a>

                  </td>
                </tr>
                @endforeach
         
              </tbody>

        </table>
      </div>
</div>

@endsection