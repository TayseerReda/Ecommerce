<div>

  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModal">Category Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
  <form  wire:submit.prevent="destroyCategory()">
  <div class="modal-body">
    <h6> Are you sure you want to delete this data! </h6>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-danger">Yes</button>
  </div>
  
  </form>
  
    </div>
  </div>
  </div>
  
  
  @if (session('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
  @endif
  <div class="card">
      <h3 class="card-header">Category
          <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm float-end"> Add Category</a>
      </h3>
      <div class="card-body">
      
          <table class="table table-bordered table-striped">
              <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $categories as $category )
                      
                  <tr>
                    <th scope="row"> {{ $category->id }}</th>
                    <td> {{ $category->name }}</td>
                    <td>{{  $category->status=='1'?'Hidden':'Visible' }}</td>
                    <td> {{ $category->slug }}</td>
                    <td> {{ $category->description }}</td>
  
                    <td>
                      <a href="{{ url('admin/category/'.$category->id.'/edit') }}" class="btn btn-info">Edit</a>
                      {{-- <a href="#" wire:click="deleteCategory({{$category->id}})" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</a> --}}
  
                      <button  class="btn btn-danger" wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete
                      </button>
                    </td>
                  </tr>
                  @endforeach
           
                </tbody>
  
          </table>
          <div >
            {{ $categories->links() }}
          </div>
      </div>
    </div>
</div>
@push('script')
<script>
  window.addEventListener('close-modal', event => {
    $('#deleteModal').modal('hide');
      
  });

</script>
@endpush