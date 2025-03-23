<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();
        return view('pages.products', compact('products'));
    }
    public function create(): View
    {
        $categories = Category::all();
        return view('pages.products.create', compact('categories'));
    }

    public function show(int $id): View
    {
        $product = Product::findOrFail($id);
        return view('pages.products', compact('product'));
    }
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'code' => 'required|string|unique:products|max:20',
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'stock' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        $products = new Product();
        $products->code = $validated['code'];
        $products->name = $validated['name'];
        $products->description = $validated['description'];
        $products->stock = $validated['stock'];
        $products->price = $validated['price'];
        $products->category_id = $validated['category_id'];
        $products->save();
        return redirect('products');
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $validated = $request->validate([
            'code' => 'required|string|unique:products|max:20',
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'stock' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        $products = Product::findOrFail($id);
        $products->code = $validated['code'];
        $products->name = $validated['name'];
        $products->description = $validated['description'];
        $products->stock = $validated['stock'];
        $products->price = $validated['price'];
        $products->category_id = $validated['category_id'];
        $products->save();
        return redirect('products');
    }

    public function destroy(int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('products');
    }
}
