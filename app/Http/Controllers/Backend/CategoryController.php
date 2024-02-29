<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; // Assuming Category model exists
use App\Models\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            // Add any other validation rules as needed
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::findOrFail($id);
        return view('backend.categories.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('backend.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            // Add any other validation rules as needed
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }


    public function getCategories()
    {
        $categories = Category::all(); // Assuming you have a Category model
        return response()->json($categories);
    }

    public function getItemsByCategory(Request $request)
    {
        $categoryId = $request->input('categoryId');

        // Assuming you have a relationship between Category and Item models
        $items = Product::whereHas('category', function ($query) use ($categoryId) {
            $query->where('id', $categoryId);
        })->get();

        return response()->json($items);
    }

    public function filteredItems(Request $request)
    {
        $categoryId = $request->input('categoryId');

        // Assuming you have a relationship between Category and Item models
        $items = Product::where('category_id', $categoryId)->get();

        // Pass the filtered items to the view
        return view('frontend.pages.filtered_items', ['items' => $items]);
    }
}
