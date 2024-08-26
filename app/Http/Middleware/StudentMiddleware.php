<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StudentMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            Log::info('User role:', ['role' => Auth::user()->role]);
            if (Auth::user()->isStudent()) {
                return $next($request);
            }
        }

        return redirect('/'); 
    }
}
