<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // <-- 1. Tambahkan import ini

class ProductController extends Controller
{
    use AuthorizesRequests; // <-- 2. Tambahkan baris ini

    public function index()
    {
        $products = Product::with(['productImage', 'discount', 'promotion'])->latest()->paginate(10);
        return response()->json(['status' => true, 'data' => $products], 200);
    }

    public function store(StoreProductRequest $request)
    {
        // Baris ini sekarang akan dikenali dan tidak akan error lagi
        $this->authorize('create', Product::class);

        $product = Product::create($request->validated());
        return response()->json(['status' => true, 'message' => 'Produk Berhasil Dibuat', 'data' => $product], 201);
    }

    public function show(Product $product)
    {
        $product->load(['productImage', 'discount', 'promotion']);
        return response()->json(['status' => true, 'data' => $product], 200);
    }

    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product); // Contoh penggunaan untuk update

        // TODO: Gunakan UpdateProductRequest untuk validasi
        $product->update($request->all());
        return response()->json(['status' => true, 'message' => 'Produk Berhasil Diupdate', 'data' => $product], 200);
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product); // Contoh penggunaan untuk delete

        $product->delete();
        return response()->json(['status' => true, 'message' => 'Produk Berhasil Dihapus'], 200);
    }

    // ... (fungsi uploadImage jika ada)
}

