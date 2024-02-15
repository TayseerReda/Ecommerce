@extends('layouts.admin')
@section('content')
@if (session('message'))
<div>

    <div class="alert alert-success">
        {{ session('message') }}
    </div>
  @endif
  <div class="card">
      <h3 class="card-header">Color List
          <a href="{{ url('admin/color/create') }}" class="btn btn-primary btn-sm float-end" > Add Color</a>
         
            </button>
      </h3>
      <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">name</th>
                  <th scope="col">code</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
            
                </tr>
              </thead>
              <tbody>
                @foreach ( $colors as $color )
                    
                <tr>
                  <th scope="row"> {{ $color->id }}</th>
                  <td> {{ $color->name }}</td>
                  <td> {{ $color->code }}</td>
                  <td>{{  $color->status=='1'?'Hidden':'Visible' }}</td>
                

                  <td>
                    <a href="{{ url('/admin/color/' . $color->id . '/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ url('/admin/color/' . $color->id . '/delete') }}" onclick="return confirm('Are you sure you want to delete it?')" class="btn btn-danger btn-sm">Delete</a>

                  </td>
                </tr>
                @endforeach
         
              </tbody>

        </table>
      </div>
</div>

@endsection