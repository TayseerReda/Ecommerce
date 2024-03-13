<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class WishlistCount extends Component
{

    
    public $count;
    protected $listeners = ['deleteOrUpdate' => 'checkCount'];
    public function checkCount()
    {
        if(Auth::check())
        {
            return $this->count=Wishlist::where('user_id',auth()->user()->id)->count();
    
        }
        else
        {
           return $this->count=0;
        }

    }
   
    public function render()
    {
        return view('livewire.frontend.wishlist-count',[
            'wishListCount'=>$this->checkCount()

        ]);
    }
}
