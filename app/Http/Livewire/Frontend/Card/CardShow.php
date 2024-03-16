<?php

namespace App\Http\Livewire\Frontend\Card;

use App\Models\Card;
use Livewire\Component;

class CardShow extends Component
{
   public $quantity=1;
    
    public function decrementQuantity($id)
    {
      $card=Card::where('user_id',auth()->user()->id)->where('id',$id)->first();

      if($card->quantity>1)
      {
          $card->quantity--;
          $card->save();
      }
      else
      {
        session()->flash('message','Invalide Quantity');
        
      }
    
      

    }
    public function incrementQuantity($id)
    {
        $card=Card::where('user_id',auth()->user()->id)->where('id',$id)->first();

        if($card->quantity<10)
      {
          $card->quantity++;
          $card->save();
      }
      else
      {
        session()->flash('message','Invalide Quantity');
        
        
      }
   

      
    }



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
