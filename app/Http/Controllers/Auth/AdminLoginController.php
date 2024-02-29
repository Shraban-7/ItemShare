<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function adminLoginView()
    {
        return view('auth.adminLogin');
    }

    public function adminLogin(Request $request)
    {
        
        // Check if the user's role is 'admin'
        $admin=User::where('email',$request->email)->where('role','admin')->first();
        if (!$admin) {
            return redirect()->route('admin.login')->withInput($request->only('email'))->withErrors([
                'email' => 'You are not authorized to access this page.',
            ]);
        }

        // If the user's role is 'admin', attempt authentication
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login')->withInput($request->only('email'))->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    public function __construct()
    {
        $this->middleware('guest')->except('admin.logout');
    }

    public function adminLogout()
    {
        Auth::logout();

        return redirect()->route('admin.login');
    }
}
