<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Brands</h4>
                </div>
                <div class="card-body">
                    @foreach ($products as $product)
                    <div class="d-block">
                        <input type="checkbox" wire:model="brandInputs" value="{{ $product->brand }}">{{ $product->brand }}

                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $product)
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                           @if ($product->quantity>0)
                           <label class="stock bg-success">In Stock</label>  
                           @else
                           <label class="stock bg-danger">Out of the Stock</label>
                           @endif
                          
                           
                            <img src="{{ asset($product->productImages[0]->image) }}" alt="">
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{ $product->brand }}</p>
                            <h5 class="product-name">
                               <a href="">
                                    {{$product->name}}
                               </a>
                            </h5>
                            <div>
                                <span class="selling-price">{{ $product->selling_price }}</span>
                                <span class="original-price">{{ $product->original_price }}</span>
                            </div>
                            <div class="mt-2">
                                <a href="" class="btn btn1">Add To Cart</a>
                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="" class="btn btn1"> View </a>
                            </div>
                        </div>
                    </div>
                </div>
                    
                @empty
                    <h1>No Product available for  {{$categories->name }}</h1>
                @endforelse
              
                    
        
        
            </div>
    
        </div>
    </div>


</div>
