<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('product')->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
            'customer'   => 'nullable|string',
        ]);

        $product = Product::findOrFail($data['product_id']);
        $total = $product->price * $data['quantity'];

        Sale::create([
            'product_id'  => $product->id,
            'quantity'    => $data['quantity'],
            'total_price' => $total,
            'customer'    => $data['customer'] ?? null,
        ]);

        // (optional) decrement product stock:
        // $product->decrement('stock', $data['quantity']);

        return redirect()->route('sales.index')->with('success', 'Sale recorded.');
    }

    public function edit(Sale $sale)
    {
        $products = Product::all();
        return view('sales.edit', compact('sale', 'products'));
    }

    public function update(Request $request, Sale $sale)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
            'customer'   => 'nullable|string',
        ]);

        $product = Product::findOrFail($data['product_id']);
        $total = $product->price * $data['quantity'];

        $sale->update([
            'product_id'  => $product->id,
            'quantity'    => $data['quantity'],
            'total_price' => $total,
            'customer'    => $data['customer'] ?? null,
        ]);

        return redirect()->route('sales.index')->with('success', 'Sale updated.');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Sale deleted.');
    }
}
