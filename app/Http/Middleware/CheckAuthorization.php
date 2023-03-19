<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CheckAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next): \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    {
        $isUserLog = User::isUserLog();

        //  If exists continue with the request page
        if ($isUserLog) {
            return $next($request);
        }

        //  If not exists redirect the user to home page
        return redirect()->route('home');
    }
}
