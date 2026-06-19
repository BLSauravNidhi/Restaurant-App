<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $tableNum, $token)
    {
        // Grab the pre-validated session attached by the middleware
        $sessionInfo = $request->attributes->get('tableSession');

        // Get The Cart Info With Items Details Or Create New Cart
        $cartItems = Cart::where([
                'session_id'=> $sessionInfo->id,
                'cart_status' => 'pending'
            ])
            ->with('GetItemsInfo')
            ->firstOrCreate(
            [
                'session_id' => $sessionInfo->id,
                'cart_status' => 'pending'
            ],
            ['session_id' => $sessionInfo->id]
        ); 
        // Assining Items Info Only 
        $viewData = [];
        $viewData['itemsInfo'] = $cartItems->GetItemsInfo ;

        return view('customer.cart',
        [
            'viewData' => $viewData,
            'sessionInfo' => $sessionInfo,
        ]);
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
        //    
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
