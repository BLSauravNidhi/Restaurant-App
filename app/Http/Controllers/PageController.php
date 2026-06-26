<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Categorie;
use App\Models\MenuItem;
use App\Models\Order;
use Illuminate\Http\Request;
// use Illuminate\Http\Request;

class PageController extends Controller
{
    public function HomePage() {
        return view('customer.welcome');
    }

    public function tableMenu(Request $request, string $tableNum, string $token){
        // Get Session Details
        $sessionInfo = $request->attributes->get('tableSession');
        
        $viewData = [];
        $viewData['menuItems'] = MenuItem::get();
        $viewData['categories'] =  Categorie::limit(10)->get();
        $viewData['cartItems'] = Cart::where('session_id', $sessionInfo->id)->with('GetItems')->first();

        return view('customer.table-menu', [
                'sessionInfo' => $sessionInfo,
                'viewData' => $viewData,
            ]);
    }

    public function verifyTablePage(string $tableNum ){
        return view('customer.verify-passcode', ['tableNum' => $tableNum]);
    }

    public function getOrdersPage(Request $request){
        $sessionInfo = $request->attributes->get('tableSession');

        $viewData = [] ;
        $viewData['orders'] = Order::where('session_id', $sessionInfo->id)->get();
        return view('customer.orders', [ 
                'sessionInfo' => $sessionInfo,
                'viewData' => $viewData
            ]);
    }
}
