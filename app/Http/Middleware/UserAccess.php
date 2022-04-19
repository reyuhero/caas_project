<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserAccess {
    public function handle(Request $request, Closure $next, $userType) {
        if(!Auth::check()) return redirect(route('login'));

        if(auth()->user()->type === $userType)
            return $next($request);

        return redirect(route('login'));
    }
}
