<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    
    public function GetItems(){
        return $this->hasMany(CartItem::class);
    }

    public function GetItemsInfo(){
        return $this->belongsToMany(MenuItem::class, 'order_items')->withPivot('quantity');
    }
}
