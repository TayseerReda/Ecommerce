<?php

namespace App\Http\Livewire\Frontend\Card;

use App\Models\Card;
use Livewire\Component;

class CardShow extends Component
{
    public function  deleteFromCard($id){
        Card::where('id',$id)->delete();
        $this->emit('checkCardCount');
        session()->flash('message','product removed successfully');

    }
    public function render()
    {
        $cardItems=Card::all();
        return view('livewire.frontend.card.card-show',[
            'cardItems'=>$cardItems
        ]);
    }
}
