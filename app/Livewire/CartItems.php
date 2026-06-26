<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\CartItem;
use Livewire\Component;

class CartItems extends Component
{
    public $item;
    public $quantity = 0;
    public $sessionInfo;

    public function mount($item, $sessionInfo){
        $this->item = $item;
        $this->sessionInfo = $sessionInfo;

        // fetch current quantity if item is already in cart 
        $cartItem = CartItem::withWhereHas('CartInfo',function($query){
                    $query->where('session_id', $this->sessionInfo->id);
                })->where('menu_item_id', $item->id)->first();

        $this->quantity = $cartItem ? $cartItem->quantity : 0 ;
    }

    private function updateItemQuantity(){
        $cart = Cart::where('session_id', $this->sessionInfo->id)->first();

        CartItem::where('cart_id', $cart->id)
                ->where('menu_item_id', $this->item->id)
                ->update([
                    'quantity' => $this->quantity,
                ]);
        $this->dispatch('cart-updated');
    }

    public function increament(){
        $this->quantity++;
        $this->updateItemQuantity();
    }
    
    public function decreament(){
        if($this->quantity > 1){
            $this->quantity--;
            $this->updateItemQuantity();
        }
    }
    
    public function render()
    {
        return view('livewire.cart-items');
    }
}
