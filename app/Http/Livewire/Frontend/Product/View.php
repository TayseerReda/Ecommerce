<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $categories, $products,$productColorQuantity,$value=1;

    public function decrement()
    {
        if($this->value>1)
        {
            $this->value--;
        }

    }
    public function increment()
    {
        if($this->value<10)
        {
            $this->value++;
        }

    }


    public function mount($categories, $products)
    {
        $this->categories=$categories;
        $this->products=$products;
    }
    public function addToWishList($product_id)
    {
        // dd('hi');
        if(Auth::check())
        {

            if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$product_id)->exists())
            {
                session()->flash('message','Already Added to wishList');
                return false;


            }
            else{
                Wishlist::create([
                    'product_id'=>$product_id,
                    'user_id'=>auth()->user()->id,
    
                ]);
                session()->flash('message','WishList Added successfully');
                $this->emit('deleteOrUpdate');

            }
        }
        else
        {
            // dd($product_id);
            session()->flash('message','Please Login To Continue');
            return false;

        }
    }
    public function colorselected($productColor_id){
       $productColor=$this->products->productColors()->where('id',$productColor_id)->first();
       $this->productColorQuantity=$productColor->quantity;
       if( $this->productColorQuantity==0)
       {
        $this->productColorQuantity="OutOfStock";
       }
      
      

    }

    public function render()
    {
        // dd($this->products);
        return view('livewire.frontend.product.view',[
            'category'=>$this->categories,
            'product'=>$this->products,

        ]);
    }
}
