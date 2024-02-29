<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
// use Brian2694\Toastr\Toastr;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    // use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        if (Auth::check()) {
            // If user is already logged in, redirect to admin dashboard or another appropriate route
            return redirect()->route('home');
        }
        // return $request->all();
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        $user = User::where('email', $request->email)->first();

        if ($user && $user->status === 1 && $user->role == 'user'||$user->role == 'renter') {
            if (Auth::attempt($credentials, $remember)) {
                // Check if the user is active
                // Authentication passed and user is active
                Toastr::success('login successfully');
                return redirect()->route('home');
            }
        } else {
            // User is not active, logout and redirect back to login page

            return redirect()->route('login')->with('error', 'Your account is not active.');
        }

        return redirect()->route('login')->withInput($request->only('email'))->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
