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

    $cartItems = Cart::with('product') // Pastikan relasi 'product' ada di Model Cart
        ->where('user_id', $user->id)
        ->get();

     return response()->json([
            'status' => true,
            'data' => $cartItems
        ], 200);
}


    // Menyimpan data baru
   public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:products,id', // Menggunakan 'product_id'
            'kuantitas' => 'required|integer|min:1'      // Menggunakan 'quantity'
        ]);

        $user = $request->user();
        $productId = $request->product_id;
        $quantity = $request->quantity;

        // Cek apakah item sudah ada di keranjang user
        $cartItem = Cart::where('user_id', $user->id)
                        ->where('produk_id', $productId)
                        ->first();

        if ($cartItem) {
            // Jika sudah ada, update kuantitasnya
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Jika belum ada, buat item baru
            $cartItem = Cart::create([
                'user_id' => $user->id,
                'produk_id' => $productId,
                'kuantitas' => $quantity
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Item berhasil ditambahkan ke keranjang',
            'data' => $cartItem->load('product') // Kirim kembali data dengan relasi produk
        ], 201);
    }

public function destroy(Cart $cart)
    {
        $user = request()->user();

        // Pastikan hanya pemilik yang bisa menghapus
        if ($cart->user_id !== $user->id) {
            return response()->json(['message' => 'Aksi tidak diizinkan.'], 403);
        }

        $cart->delete();

        return response()->json(['message' => 'Item berhasil dihapus dari keranjang.'], 200);
    }

}
