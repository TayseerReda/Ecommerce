<?php

namespace App\Http\Livewire\Frontend\Card;

use App\Models\Card;
use Illuminate\Queue\Listener;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CardCount extends Component
{
    public $count=0;
    protected $listeners=['checkCardCount'=>'UpdateDeleteCard'];
    public function UpdateDeleteCard()
    {
        if(Auth::check())
        {
        return $this->count=Card::where('user_id',auth()->user()->id)->count();
        }
        else return $this->count=0;
    }
    public function render()
    {
        return view('livewire.frontend.card.card-count',['cardcount'=>$this->UpdateDeleteCard()]);
    }
}
