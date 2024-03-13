<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use App\Models\Wishlist;
use Livewire\Component;

class View extends Component
{
    public function deleteItem($product_id)
    {
        Wishlist::where('user_id',auth()->user()->id)->where('product_id',$product_id)->delete();
        $this->emit('deleteOrUpdate');

    }
    public function render()
    {
        $wishListItems=Wishlist::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.wishlist.view',[
            'wishListItems'=>$wishListItems
        ]);
    }
}
