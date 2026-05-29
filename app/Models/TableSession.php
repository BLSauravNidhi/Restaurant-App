<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableSession extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function table(){
        return $this->belongsTo(Table::class);
    }
    public function cart(){
        return $this->hasOne(Cart::class, 'session_id');
    }

    public function cartItems(){
        return $this->hasOneThrough(cart_items::class, Cart::class);
    }
}
