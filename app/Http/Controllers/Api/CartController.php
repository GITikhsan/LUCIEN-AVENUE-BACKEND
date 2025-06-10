<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart; // GANTI DENGAN MODEL YANG SESUAI
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $data = Cart::paginate(10);
        return response()->json(['status' => true, 'data' => $data], 200);
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        // TODO: Tambahkan validasi
        $data = Cart::create($request->all());
        return response()->json(['status' => true, 'message' => 'Data Berhasil Dibuat', 'data' => $data], 201);
    }

    // Menampilkan satu data
    public function show(Cart $cart) // Ganti variabelnya
    {
        return response()->json(['status' => true, 'data' => $cart], 200);
    }

    // Mengupdate data
    public function update(Request $request, Cart $cart)
    {
        // TODO: Tambahkan validasi
        $cart->update($request->all());
        return response()->json(['status' => true, 'message' => 'Data Berhasil Diupdate', 'data' => $cart], 200);
    }

    // Menghapus data
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return response()->json(['status' => true, 'message' => 'Data Berhasil Dihapus'], 200);
    }
}
