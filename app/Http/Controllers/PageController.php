<?php

namespace App\Http\Controllers;

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
        // return $verifyTableAccess ;
        if($verifyTableAccess){
            // Get Session Details
            $sessionInfo = TableSession::where('session_token', $token)->first();
            return view('customer.table-menu', ['sessionInfo' => $sessionInfo]);
        } else {
            return redirect()->route('HomePage');
        }
    }

    public function verifyTablePage(string $tableNum ){
        return view('customer.verify-passcode', ['tableNum' => $tableNum]);
    }
}
