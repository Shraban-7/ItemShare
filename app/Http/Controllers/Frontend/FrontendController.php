<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function product(Request $request)
    {
        $products = Product::where('is_available', 1)->paginate(10);

        // Filter products with status 1

        return view('frontend.pages.products', compact('products'));
    }

    public function productsByCategory(Category $category)
    {
        $products = Product::where('category_id',$category->id)->get();
        return view('frontend.pages.cat_products', compact('products', 'category'));
    }

}
