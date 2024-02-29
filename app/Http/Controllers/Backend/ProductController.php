<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function admin_product()
    {
        $products = Product::all();
        return view('backend.pages.products.index', compact('products'));
    }
    public function index()
    {
        $products = Product::where('user_id',auth()->id())->get();
        return view('frontend.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::all();
        return view('frontend.pages.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image', // 2MB max size
            'description' => 'nullable|string',
            'status' => 'nullable|boolean',
            'is_available' => 'nullable|boolean',
            'rental_duration' => 'nullable|integer',
            'rental_fee' => 'nullable|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/products', $imageName);
            $requestData['image'] = $imageName;
        }

        // Assuming 'user_id' is authenticated user's id
        $requestData['user_id'] = auth()->id();

        Product::create($requestData);

        Toastr::success('product add successfully','title',);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('backend.products.show', compact('product'));
    }
    public function details(Product $product)
    {
        return view('frontend.pages.product_details', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories= Category::all();
        return view('frontend.pages.products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|max:2048', // 2MB max size
            'description' => 'nullable|string',
            'status' => 'nullable|boolean',
            'is_available' => 'nullable|boolean',
            'rental_duration' => 'nullable|integer',
            'rental_fee' => 'nullable|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/products', $imageName);
            $requestData['image'] = $imageName;
        }

        $product->update($requestData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
