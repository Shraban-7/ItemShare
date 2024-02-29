<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $admin= User::where('role','admin')->first();
        if (!$admin) {
            return redirect()->route('admin.login.view');
        }
        return $next($request);
    }
}
