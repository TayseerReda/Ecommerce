<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addBrandModal">Add Brand</h1>
          <button type="button" wire:click="close_modal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="storBrand()">
            <div class="modal-body">
                <div class="mb-3">
                    <label >Brand Name</label>
                    <input type="text"  wire:model.defer="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label >slug</label>
                    <input type="text"  wire:model.defer="slug" class="form-control">
                </div>
                <div class="mb-3">
                    <label >Status</label><br>
                    <input type="checkbox" wire:model.defer="status">checked=Hidden,unchecked=visible
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" wire:click="close_modal()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save </button>
            </div>
        </form>
      </div>
    </div>
  </div>



  {{-- edit Modal --}}

  <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModal">Edit Brand</h1>
          <button type="button" wire:click="close_modal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="update_modal()">
            <div class="modal-body">
                <div class="mb-3">
                    <label >Brand Name</label>
                    <input type="text"  wire:model.defer="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label >slug</label>
                    <input type="text"  wire:model.defer="slug" class="form-control">
                </div>
                <div class="mb-3">
                    <label >Status</label><br>
                    <input type="checkbox" wire:model.defer="status">checked=Hidden,unchecked=visible
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" wire:click="close_modal()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update </button>
            </div>
        </form>
      </div>
    </div>
  </div>


  {{-- Delete Modal --}}

  
  <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModal">Edit Brand</h1>
          <button type="button" wire:click="close_modal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="destroy_modal()">
            <div class="modal-body">
                <h6>Are you sure you want to delete the item!</h6>
                
            </div>
            <div class="modal-footer">
              <button type="button" wire:click="close_modal()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update </button>
            </div>
        </form>
      </div>
    </div>
  </div>
