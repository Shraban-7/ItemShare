<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index()
    {
        // Fetch latest 8 reviews
        $reviews = Review::latest()->take(8)->get();

        // Fetch products or whatever you need for the existing section
        $products = Product::all(); // Assuming you have a Product model

        return view('frontend.index', compact('reviews', 'products'));
    }

    public function create()
    {
        return view();
    }



    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'comment' => 'required|string',
            'rating' => 'required|numeric|min:1|max:5',
            'product_id' => 'required|exists:products,id',

        ]);


        Review::create([
            'comment' => $validatedData['comment'],
            'rating' => $validatedData['rating'],
            'product_id' => $validatedData['product_id'],
            'user_id' => auth()->id(),

        ]);

        Toastr::success('add review successfully','Title',['colorClass'=>'green']);

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }
}
