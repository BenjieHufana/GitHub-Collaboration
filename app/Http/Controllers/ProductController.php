<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required|string',
            'sku'   => 'required|string|unique:products,sku',
            'price' => 'required|numeric',
            'stock' => 'nullable|integer'
        ]);

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product created.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'  => 'required|string',
            'sku'   => 'required|string|unique:products,sku,'.$product->id,
            'price' => 'required|numeric',
            'stock' => 'nullable|integer'
        ]);

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted.');
    }
}
