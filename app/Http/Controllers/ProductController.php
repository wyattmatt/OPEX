<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Department;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['statusModel', 'typeModel', 'roomModel']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $products = $query->latest()->paginate(10);
        $statuses = \App\Models\Status::all();
        $types = \App\Models\Type::all();
        
        return view('products', compact('products', 'statuses', 'types'));
    }

    public function create()
    {
        $statuses = \App\Models\Status::all();
        $types = \App\Models\Type::all();
        $rooms = \App\Models\Room::all();
        return view('add-product', compact('statuses', 'types', 'rooms'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'barcode' => 'required|string|unique:products,barcode',
            'name' => 'required|string',
            'status' => 'required|exists:status,id',
            'type' => 'required|exists:types,id',
            'room' => 'required|exists:rooms,id',
            'noted' => 'nullable|string',
        ]);

        $product = new Product($validated);
        $product->created_by = auth()->id();
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function search(Request $request)
    {
        $request->validate(['barcode' => 'required|string']);
        
        $product = Product::where('barcode', $request->barcode)->first();
        
        if ($product) {
            return redirect()->route('products.edit', $product->id);
        }
        
        return back()->withErrors(['barcode' => 'Asset with this barcode not found in the system.']);
    }

    public function scan($barcode)
    {
        $product = Product::where('barcode', $barcode)->first();
        
        if ($product) {
            return redirect()->route('products.edit', $product->id);
        }
        
        return redirect()->route('products.index')->withErrors(['barcode' => 'Asset with scanned barcode not found.']);
    }

    public function edit(Product $product)
    {
        $statuses = \App\Models\Status::all();
        $types = \App\Models\Type::all();
        $rooms = \App\Models\Room::all();
        return view('edit-product', compact('product', 'statuses', 'types', 'rooms'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'barcode' => 'required|string|unique:products,barcode,' . $product->id,
            'name' => 'required|string',
            'status' => 'required|exists:status,id',
            'type' => 'required|exists:types,id',
            'room' => 'required|exists:rooms,id',
            'noted' => 'nullable|string',
        ]);

        $product->fill($validated);
        $product->modified_by = auth()->id();
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
