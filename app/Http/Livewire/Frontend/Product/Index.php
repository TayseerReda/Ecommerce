<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products,$categories,$brandInputs=[],$priceInputs;
    protected $queryString = ['brandInputs','priceInputs'];



    public function mount($categories)
    {
        
        $this->categories=$categories;
    }
    public function render()
    {
        $this->products=Product::where('category_id',$this->categories->id)
        ->when($this->brandInputs,function($q){
            $q->whereIn('brand',$this->brandInputs);
        })
        ->when($this->priceInputs=='low-to-high',function($q2){
            $q2->orderBy('selling_price','ASC');
        })
        ->when($this->priceInputs=='high-low-to',function($q2){
            $q2->orderBy('selling_price','DESC');
        })
        ->where('status','0')->get();
        return view('livewire.frontend.product.index',[
            'products'=>$this->products,
            'categories'=>$this->categories,

        ]);
    }
}
