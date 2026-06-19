<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Attributes\On;
use Livewire\Component;

class CartTotal extends Component
{
    public $totalBill = 0;
    public $sessionInfo;

    public function mount($sessionInfo)
    {
        $this->sessionInfo = $sessionInfo;
        
        // 2. Calculate the initial bill right away when the page loads
        $this->updateBill(); 
    }

    #[On('cart-updated')]
    public function updateBill()
    {
        $this->totalBill = 0;
        
        $cart = Cart::where('session_id', $this->sessionInfo->id)
        ->where('cart_status', 'pending')
        ->withWhereHas('GetItemsInfo')
        ->first();

        if($cart){
            $itemInfo = $cart->GetItemsInfo;
            foreach($itemInfo as $item){
                $this->totalBill += $item->price * $item->pivot->quantity;
            }
        }
    }
    public function render()
    {
        return view('livewire.cart-total');
    }
}
