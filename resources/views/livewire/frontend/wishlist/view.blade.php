<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
    
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                              
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
               @forelse ($wishListItems as $item)
                   
               <div class="cart-item">
                   <div class="row">
                       <div class="col-md-6 my-auto">
                           <a href="">
                               <label class="product-name">
                                   <img src="{{ $item->products->productImages[0]->image}}" style="width: 50px; height: 50px" alt="">
                                   {{ $item->products->name }}
                               </label>
                           </a>
                       </div>
                       <div class="col-md-2 my-auto">
                           <label class="price"> {{ $item->products->selling_price }} </label>
                       </div>
                       <div class="col-md-2 col-7 my-auto">
                          
                       </div>
                       <div class="col-md-2 col-5 my-auto">
                           <div class="remove">
                               <button type="button" wire:click='deleteItem({{$item->product_id}})' class="btn btn-danger btn-sm">
                                   <i class="fa fa-trash"></i> Remove
                               </button>
                           </div>
                       </div>
                   </div>
               </div>
               @empty
                   
               @endforelse
                    
              

                
                                
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
