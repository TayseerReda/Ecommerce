<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                       
                       
                        <img src=" {{ asset($products->productImages[0]->image) }}" class="w-100" alt="Img">
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                           {{$product->name}}
                            <label class="label-stock bg-success">In Stock</label>
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / Category / Product / HP Laptop
                        </p>
                        <div>
                            <span class="selling-price">{{ $product->selling_price }}</span>
                            <span class="original-price">{{ $product->original_price }}</span>
                        </div>
                        <div>
                            @if ($product->productColors->count()>0)
                                @if ($product->productColors)
                                    @foreach ($product->productColors as $colorItem)
                                    <label for="" class="btn text-white" style="background-color:{{ $colorItem->colors->name }} "
                                        wire:click='colorselected({{ $colorItem->id }})'>
                                        {{ $colorItem->colors->name }}</label>
                                        
                                        @endforeach
                                @endif

                                @if ($productColorQuantity=="OutOfStock")
                                <label for="" class="btn btn-danger ">Out Of Stock</label>
                                @elseif ($productColorQuantity>0)
                                <label for="" class="btn btn-success">In Stock</label>

                                    
                                @endif
                            @else
                            @if ($product->quantity)
                                
                            <label for="" class="btn-btn-danger text-white">Out Of Stock</label>

                                    
                            @else
                            <label for="" class="btn-btn-success text-white">In Stock</label>

                                
                            @endif

                                
                            @endif
                          
                            
                                
                                
                          
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click='decrement()'><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model='value' value="{{$this->value}}" class="input-quantity" />
                                <span class="btn btn1" wire:click='increment()' ><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                            <button type="button" class="btn btn1" wire:click="addToWishList({{ $product->id }})">
                                 <i class="fa fa-heart"></i> Add To Wishlist
                             </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {{ $product->small_description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $product->description }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
