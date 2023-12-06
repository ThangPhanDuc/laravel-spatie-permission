<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('products.index', compact('products','categories'));
    }
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function create()
    {

        $categories = Category::all();
        $product = new Product();
        return view('products.create', compact('product', 'categories'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete_products', $product);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
