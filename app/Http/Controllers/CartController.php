<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Grab the pre-validated session attached by the middleware
        $sessionInfo = $request->attributes->get('tableSession');

        // Get The Cart Info With Items Details Or Create New Cart
        $cartItems = Cart::where([
                'session_id'=> $sessionInfo->id,
            ])
            ->with('GetItemsInfo')
            ->firstOrCreate(
            [
                'session_id' => $sessionInfo->id,
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
    public function update(Request $request)
    {
        $sessionInfo = $request->attributes->get('tableSession');
        $cart = Cart::where('session_id', $sessionInfo->id)
        ->with('GetItemsInfo')
        ->first();
        // Getting total amount to insert in orders table
        $total_amount = 0;
        foreach($cart->GetItemsInfo as $cart_item){
            $total_amount += $cart_item->price * $cart_item->pivot->quantity;
        }
        // Creating Order
        $order = Order::create([
            'session_id' => $sessionInfo->id,
            'status' => 'pending',
            'total_amount' => $total_amount,
            'ordered_at' => now(),
        ]);
        // Collecting Cart items in the array
        if($order){
            foreach ($cart->GetItemsInfo as $item) {
                $orderItems[] = [
                    'order_id'   => $order->id,
                    'menu_item_id' => $item->id,
                    'quantity'   => $item->pivot->quantity,
                ];
            }
            // Checking and inserting items to orders
            if (!empty($orderItems)) {
                OrderItem::insert($orderItems);
            }
            // Deleting Cart along with their items after ordering
            $cart->delete();

            return redirect()->route('ordersPage',[$sessionInfo->table_number, $sessionInfo->session_token]);
        } else {
            return redirect()->route('cart.index', ['tableNum' => $sessionInfo->table_number, 'token' => $sessionInfo->session_token])
            ->withErrors(['place_order' => 'Oops something went wrong.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
