<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    
    public function GetItems(){
        return $this->hasMany(CartItem::class);
    }
    public function GetItemsInfo(){
        return $this->belongsToMany(MenuItem::class, 'cart_items')->withPivot('quantity');
    }
}
