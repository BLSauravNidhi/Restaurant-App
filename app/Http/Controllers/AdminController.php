<?php

namespace App\Http\Controllers;
use App\Models\Table;
use App\Models\TableRequest;
use App\Models\TableSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function tableRequestApproved(string $adminId, string $reqId){
        // first get the request info
        $requestInfo = TableRequest::with('tableInfo')->find($reqId);
        
        // Generating unique token by checking token exists or not
        do {
            $token = (string) Str::uuid();
        } while (TableSession::where('session_token', $token)->exists());
        
        // creating session for the table
        $createSession = TableSession::create([
            'table_number' => $requestInfo->tableInfo->table_number,
            'session_token' => $token,
            'active' => true,
            'expires_at' => now()->addHours(1.5),
            'ip_address' =>  \Request::ip(),
            'user_agent' => NULL,
        ]);
        
        // After creating session, providing session id and admin info to the TableRequests table
        $approveRequest = TableRequest::where('id', $reqId)->update([
            'session_id' => $createSession->id,
            'request_status' => 'approved',
            'status_updated_at' => now(),
            'status_updated_by' => $adminId,
        ]);

        return redirect()->route('TableRequests');
    }
    public function tableRequestRejected(string $adminId, string $reqId){
        // Reject request
        $rejectRequest = TableRequest::whereId($reqId)->update([
            'request_status' => 'rejected',
            'status_updated_by' => $adminId,
            'status_updated_at' => now(),
        ]);

        return redirect()->route('TableRequests');
    }

    // cancel the occupied table
    public function cancelTable(string $adminId, string $sessionId){
        $tableSession = TableSession::find($sessionId);
        $tableSession->delete();

        $tableRequest = TableRequest::where('session_id', $tableSession->id)
            ->update(['request_status' => 'cancelled',]);

        return redirect()->route('TableStatus');
    }


    // logout 
    public function logout(){
        Auth::guard('admin')->logout();
        return view('admin.login');
    }
}
