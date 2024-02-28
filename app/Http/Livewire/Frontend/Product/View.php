<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class View extends Component
{
    public $categories, $products,$productColorQuantity;

    public function mount($categories, $products)
    {
        $this->categories=$categories;
        $this->products=$products;
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
