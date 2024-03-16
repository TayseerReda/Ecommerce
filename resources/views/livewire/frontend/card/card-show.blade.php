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
                                <div class="col-md-4">
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
                                    <h4>Total Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>

                        <div class="cart-item">
                            @php
                                $totalPrice=0;
                            @endphp
                            @forelse ($cardItems as $item)
                                
                            <div class="row">
                                <div class="mt-4 col-md-4 my-auto">
                                    <a href="{{url('collection/'.$item->products->category->slug.'/'.$item->products->slug)  }}">
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
                                            <span class="btn btn1" wire:click='decrementQuantity({{ $item->id }})'><i class="fa fa-minus"></i></span>
                                            <input type="text"  value="{{$item->quantity}}" class="input-quantity" />
                                            <span class="btn btn1" wire:click='incrementQuantity({{ $item->id }})' ><i class="fa fa-plus"></i></span>
                                        </div>
                                    </div>
                                   
                                </div>

                                <div class="col-md-2 my-auto">
                                    <label class="price">${{  $item->products->selling_price*$item->quantity }} </label>
                                    @php
                                        $totalPrice+=$item->products->selling_price*$item->quantity;
                                    @endphp
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


            <div class="row ">
                <div class="col-md-8 my-md-auto  mt-3">
                    <h5>Get the best deals $ offers <a href="{{ url('/collection') }}">Shop now</a></h5>
                </div>
                   <div class="col-md-4 mt-3">
                    <div class="shadow-sm bg-white p-3">
                        <h4>
                            Total:
                            <span class="float-end">${{ $totalPrice }}</span>
                        </h4>
                    </div>
                    <hr>
                    <a href="{{ url('checkout') }}" class="btn btn-warning w-100">CheckOut</a>
                   </div>

               
            </div>
        </div>
    </div>
</div>

