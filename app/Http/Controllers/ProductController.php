<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('user')->get(); // biar relasi aman
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(StoreProductRequest $request)
    {
        // hanya admin
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validated();
        

        Product::create($validated);

        return redirect()->route('product.index')
            ->with('success', 'Product berhasil ditambahkan');
    }

    public function show(int $id)
{
    try {

        $product = Product::with('category')->find($id);

        if (!$product) {

            return response()->json([
                'message' => 'Product tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'message' => 'Product retrieved successfully',
            'data' => $product
        ], 200);

    } catch (\Throwable $e) {

        Log::error('Gagal mengambil data produk', [
            'message' => $e->getMessage(),
        ]);

        return response()->json([
            'message' => 'Terjadi kesalahan'
        ], 500);
    }
}

    public function edit($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $product = Product::findOrFail($id);
        $product->update($request->validated());

        return redirect()->route('product.index')
            ->with('success', 'Product berhasil diupdate');
    }

    public function destroy($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')
            ->with('success', 'Product berhasil dihapus');
    }
}