<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{   
    // Login page
    public function AdminLogin() {
        if(Auth::guard('admin')->check()){
            if(Auth::guard('admin')->user()->role == 'administrator'){
                return redirect()->route('AdminDashboard');
            }
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

    public function analytics(){
        return view('admin.administrator.admin-analytics');
    }

    // logout 
    public function logout(){
        Auth::guard('admin')->logout();
        return view('admin.login');
    }
}
