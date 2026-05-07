<?php

namespace App\Http\Controllers;
use App\Models\Table;
use App\Models\TableRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{   
    // Login page
    public function AdminLogin() {
        if(Auth::guard('admin')->check()){
            return redirect()->route('AdminDashboard');
        } else {
            return view('admin.login');
        }
    }
    
    // login credentials check 
    public function authenticateAdmin(Request $formData) {
        $credentials = $formData->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('AdminDashboard');
            } else {
                return back()->withErrors([
                'email' => 'These Credentials do not match to any user',
            ]);
            }
            
            }
            
    // admin dashboard 
    public function dashboard() {
        switch(Auth::guard('admin')->user()->role){
            case 'administrator':
                return view('admin.administrator.admin-dashboard');
            case 'waiter':
                return view('admin.waiter.waiter-dashboard');
            case 'kitchen':
                return view('admin.kitchen.kitchen-dashboard');
        }
    }

    // admin pages ----------------------------------------------------
    public function analytics(){
        return view('admin.administrator.admin-analytics');
    }
    
    // ----------------------------------------------------------------
    public function tableStatus(){

        $restaurentTables = Table::with(['tblsessions'=> function($query){
            $query->Where('expires_at', '>', now());
        }])->get();
        // return $restaurentTables;
        return view('admin.waiter.table-status', compact('restaurentTables'));
    }


    public function tableRequests(){
        $tableRequests = TableRequest::orderBy('made_at', 'desc')
            ->with('tableinfo')
            ->where('request_status','pending')->get();

        // return $tableRequests;
        return view('admin.waiter.table-requests', ['tableRequests' => $tableRequests ]);
    }


    // logout 
    public function logout(){
        Auth::guard('admin')->logout();
        return view('admin.login');
    }
}
