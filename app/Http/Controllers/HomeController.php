<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user(); // Get the authenticated user

        if ($user->role == 'user') {
            $bookingCount = Booking::where('user_id', $user->id)->count();
            return view('home', compact('bookingCount'));
        } elseif ($user->role == 'renter') {
            $productCount = Product::where('user_id', $user->id)->count();
            $rentedProductCount = Product::where('user_id', $user->id)->count();

            // Retrieve orders associated with products owned by the renter user
            $orders = Booking::join('products', 'bookings.product_id', '=', 'products.id')
                              ->where('products.user_id', $user->id)
                              ->get();
            // return $orders;
            return view('home', compact('productCount', 'rentedProductCount', 'orders'));
        }
    }
}
