<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart; // GANTI DENGAN MODEL YANG SESUAI
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Menampilkan semua data
    public function index(Request $request)
{
    $user = $request->user(); // ambil user yang sedang login

    $data = Cart::with('product')
        ->where('user_id', $user->id)
        ->get();

    return response()->json([
        'status' => true,
        'data' => $data
    ], 200);
}



    // Menyimpan data baru
   public function store(Request $request)
{
    $request->validate([
        'produk_id' => 'required|exists:products,id',
        'kuantitas' => 'required|integer|min:1'
    ]);

    $user = $request->user();
    $productId = $request->produk_id;
    $kuantitasBaru = $request->kuantitas;

    // Cek apakah item produk ini sudah ada di keranjang user
    $cart = Cart::where('user_id', $user->id)
                ->where('produk_id', $productId)
                ->first();

    if ($cart) {
        // Jika sudah ada, update kuantitas dan subtotal
        $cart->kuantitas += $kuantitasBaru;
        $cart->subtotal = $cart->kuantitas * $cart->harga_satuan;
        $cart->save();
    } else {
        // Ambil harga dari produk
        $harga = \App\Models\Product::findOrFail($productId)->price;

        // Tambah data baru ke cart
        $cart = Cart::create([
            'user_id' => $user->id,
            'produk_id' => $productId,
            'kuantitas' => $kuantitasBaru,
            'harga_satuan' => $harga,
            'subtotal' => $harga * $kuantitasBaru
        ]);
    }

    return response()->json([
        'status' => true,
        'message' => 'Item berhasil ditambahkan ke keranjang',
        'data' => $cart
    ], 201);
}

public function destroy(Cart $cart)
{
    $user = request()->user();

    // Pastikan hanya user pemilik yang bisa menghapus
    if ($cart->user_id !== $user->id) {
        return response()->json([
            'status' => false,
            'message' => 'Tidak diizinkan menghapus item ini.'
        ], 403);
    }

    $cart->delete();

    return response()->json([
        'status' => true,
        'message' => 'Item berhasil dihapus dari keranjang.'
    ], 200);
}

}
