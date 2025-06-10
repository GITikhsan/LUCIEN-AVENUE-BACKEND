<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['productImage', 'discount', 'promotion'])->latest()->paginate(10);
        return response()->json(['status' => true, 'data' => $products], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_sepatu' => 'required|string|max:255',
            'harga_retail' => 'required|numeric',
            'ukuran' => 'required|string',
            'warna' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // TODO: Tambahkan logika upload gambar dan hubungkan gambar_produk_id
        $product = Product::create($request->all());
        return response()->json(['status' => true, 'message' => 'Produk Berhasil Dibuat', 'data' => $product], 201);
    }

    public function show(Product $product)
    {
        $product->load(['productImage', 'discount', 'promotion']);
        return response()->json(['status' => true, 'data' => $product], 200);
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return response()->json(['status' => true, 'message' => 'Produk Berhasil Diupdate', 'data' => $product], 200);
    }

    public function destroy(Product $product)
    {
        // TODO: Tambahkan logika hapus gambar dari storage jika ada
        $product->delete();
        return response()->json(['status' => true, 'message' => 'Produk Berhasil Dihapus'], 200);
    }
}
