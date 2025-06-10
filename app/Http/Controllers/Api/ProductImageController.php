<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductImage; // GANTI DENGAN MODEL YANG SESUAI
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $data = ProductImage::paginate(10);
        return response()->json(['status' => true, 'data' => $data], 200);
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        // TODO: Tambahkan validasi
        $data = ProductImage::create($request->all());
        return response()->json(['status' => true, 'message' => 'Data Berhasil Dibuat', 'data' => $data], 201);
    }

    // Menampilkan satu data
    public function show(ProductImage $product_image) // Ganti variabelnya
    {
        return response()->json(['status' => true, 'data' => $product_image], 200);
    }

    // Mengupdate data
    public function update(Request $request, ProductImage $product_image)
    {
        // TODO: Tambahkan validasi
        $product_image->update($request->all());
        return response()->json(['status' => true, 'message' => 'Data Berhasil Diupdate', 'data' => $product_image], 200);
    }

    // Menghapus data
    public function destroy(ProductImage $product_image)
    {
        $product_image->delete();
        return response()->json(['status' => true, 'message' => 'Data Berhasil Dihapus'], 200);
    }
}
