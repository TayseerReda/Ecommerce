<div>

  @include('livewire.admin.brand.modal')
  @if (session('message'))
  <div class="alert alert-success">
      {{ session('message') }}
  </div>
@endif
    <div class="card">
        <h3 class="card-header">Brand List
            {{-- <a href="#" class="btn btn-primary btn-sm float-end" data-bs-target="#addBrandModal"> Add Brand</a> --}}
            <button type="button"  class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addBrandModal">
                Add Brand
              </button>
        </h3>
        <div class="card-body">
        
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Status</th>
                      <th scope="col">Slug</th>
                      <th scope="col">Action</th>
                
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $brands as $brand )
                        
                    <tr>
                      <th scope="row"> {{ $brand->id }}</th>
                      <td> {{ $brand->name }}</td>
                      <td>{{  $brand->status=='1'?'Hidden':'Visible' }}</td>
                      <td> {{ $brand->slug }}</td>
    
                      <td>
                        <button type="button" wire:click="editBrand({{ $brand->id  }})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button> 
                                              
                        <button type="button" class="btn btn-danger" wire:click="deleteBrand({{ $brand->id  }})"  data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                      
                      </td>
                    </tr>
                    @endforeach
             
                  </tbody>
    
            </table>
            <div>
                {{ $brands->links() }}
            </div>
            
        </div>
      </div>
</div>

@push('script')
<script>
  window.addEventListener('close-modal', event => {
    $('#addBrandModal').modal('hide');
      
  });

  window.addEventListener('closeUpdate-modal', event => {
    $('#editModal').modal('hide');
      
  });
  window.addEventListener('closeDelete-modal', event => {
    $('#deleteModal').modal('hide');
      
  });

</script>
@endpush

  
