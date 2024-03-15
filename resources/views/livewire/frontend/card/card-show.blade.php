<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
 
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
                                {{-- <div class="col-md-2">
                                    <h4>color</h4>
                                </div> --}}
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>

                        <div class="cart-item">
                            @forelse ($cardItems as $item)
                                
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a href="">
                                        <label class="product-name">
                                           
                                            <img src="{{ asset( $item->products->productImages[0]->image ) }}" style="width: 50px; height: 50px" alt="">
                                            {{ $item->products->name }}
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price">${{  $item->products->selling_price }} </label>
                                </div>
                                {{-- <div class="col-md-2 my-auto">
                                    <label class="color">{{  $item->productColors->colors->name }} </label>
                                </div> --}}
                                <div class="col-md-2 col-7 my-auto">
                                    <div class="quantity">
                                        <div class="input-group">
                                            <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                            <input type="text" value="1" class="input-quantity" />
                                            <span class="btn btn1"><i class="fa fa-plus"></i></span>
                                        </div>
                                    </div>
                                   
                                </div>
                                
                                <div class="col-md-2 col-5 my-auto">
                                    <div class="remove">
                                        <button type="button"  wire:click='deleteFromCard({{$item->id }})'class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <h1>Nothing In Your Card</h1>
                            @endforelse
                        </div>
                       
                                
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

