<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products,$categories,$brandInputs=[];
    protected $queryString = ['brandInputs'];



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
        ->where('status','0')->get();
        return view('livewire.frontend.product.index',[
            'products'=>$this->products,
            'categories'=>$this->categories,

        ]);
    }
}
