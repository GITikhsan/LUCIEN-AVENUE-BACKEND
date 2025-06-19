<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Menampilkan semua data keranjang milik user
    public function index(Request $request)
    {
        $user = $request->user();

        $cartItems = Cart::with('product')
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
            'produk_id' => 'required|exists:products,id', // Diubah menjadi product_id
            'kuantitas'  => 'required|integer|min:1'     // Diubah menjadi kuantitas
        ]);

        $user = $request->user();
        $productId = $request->produk_id;
        $quantity = $request->kuantitas;

        // Cek apakah item sudah ada di keranjang user
        $cartItem = Cart::where('user_id', $user->id)
            ->where('produk_id', $productId) // Diubah menjadi product_id
            ->first();

        if ($cartItem) {
            // Jika sudah ada, update kuantitasnya
            $cartItem->kuantitas += $quantity; // Diubah menjadi kuantitas
            $cartItem->save();
        } else {
            // Jika belum ada, buat item baru
            $cartItem = Cart::create([
                'user_id' => $user->id,
                'produk_id' => $productId, // Diubah menjadi product_id
                'kuantitas' => $quantity    // Diubah menjadi kuantitas
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Item berhasil ditambahkan ke keranjang',
            'data' => $cartItem->load('product')
        ], 201);
    }

    // Menghapus item dari keranjang
    public function destroy(Request $request, Cart $cart)
    {
        // Route model binding 'Cart $cart' sudah benar
        $user = $request->user();

        // Pastikan hanya pemilik yang bisa menghapus
        if ($cart->user_id !== $user->id) {
            return response()->json(['message' => 'Aksi tidak diizinkan.'], 403);
        }

        $cart->delete();

        return response()->json(['message' => 'Item berhasil dihapus dari keranjang.'], 200);
    }
}
