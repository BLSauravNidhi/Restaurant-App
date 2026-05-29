<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\TableSession;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($tableNum, $token)
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,$tableNum ,$token)
    {
        $request->validate([
            'item_id' => 'required',
        ]);

        // check if there is any cart 
        
        $sessionInfo = TableSession::where('session_token', $token)->first();
        $cart = Cart::firstOrCreate(
            [
                'session_id' => $sessionInfo->id,
                'cart_status' => 'pending'
            ],
            ['session_id' => $sessionInfo->id]
        );  

        if($cart){
            $addItmes = CartItem::updateOrCreate(
                [
                    'cart_id' => $cart->id,
                    'menu_item_id' => $request->item_id,
                ],
                [ 
                    'quantity' => 1,
                ]
            );
            
            if($addItmes){
                return response()->json([
                    'success' => true,
                    'message' => 'Cart updated successfully!'
                ]);
            }
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
