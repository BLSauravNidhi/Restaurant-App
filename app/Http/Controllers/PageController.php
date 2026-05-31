<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Categorie;
use App\Models\MenuItem;
use App\Models\TableSession;
// use Illuminate\Http\Request;

class PageController extends Controller
{
    public function HomePage() {
        return view('customer.welcome');
    }

    public function tableMenu(string $tableNum, string $token){
        $verifyTableAccess = TableSession::where('table_number', $tableNum)
            ->where('session_token',$token)
            ->where('expires_at','>', now())
            ->first();

        if($verifyTableAccess){
            // Get Session Details
            $sessionInfo = TableSession::where('session_token', $token)->first();
            
            $viewData = [];
            $viewData['menuItems'] = MenuItem::get();
            $viewData['categories'] =  Categorie::limit(10)->get();
            $viewData['cartItems'] = Cart::where('session_id',$sessionInfo->id)->with('GetItems')->first();

            return view('customer.table-menu', [
                    'sessionInfo' => $sessionInfo,
                    'viewData' => $viewData,
                ]);
        } else {
            return redirect()->route('HomePage');
        }
    }

    public function verifyTablePage(string $tableNum ){
        return view('customer.verify-passcode', ['tableNum' => $tableNum]);
    }
}
