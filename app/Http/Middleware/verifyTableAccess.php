<?php

namespace App\Http\Middleware;

use App\Models\TableSession;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class verifyTableAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the Table Number And Session Token 
        $tableNum = $request->route('tableNum');
        $token = $request->route('token');
        // Check If Token Exists and Not Expired 
        $sessionInfo = TableSession::where('table_number', $tableNum)
            ->where('session_token',$token)
            ->where('expires_at','>', now())
            ->first();
        // If Session Does not Exist or Expire then Redirect To Home Page 
        if(!$sessionInfo){
            return redirect()->route('HomePage');
        }
        // If Exists Then Proceed 
        $request->attributes->set('tableSession', $sessionInfo);
        return $next($request);
    }
}
