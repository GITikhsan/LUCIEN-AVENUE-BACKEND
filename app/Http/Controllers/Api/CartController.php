<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Tambahkan ini untuk logging

class CartController extends Controller
{
    // Method index (tidak ada perubahan)
    public function index(Request $request)
    {
        $user = $request->user();
        $cartItems = Cart::with('product')
            ->where('user_id', $user->user_id)
            ->get();
        return response()->json(['status' => true, 'data' => $cartItems], 200);
    }

    // Method store (DENGAN PERBAIKAN)
   public function store(Request $request)
{
    // Gunakan Log untuk melacak
    Log::info('--- Proses Add to Cart Dimulai ---');
    Log::info('Data Request:', $request->all());

    $request->validate([
        'produk_id' => 'required|exists:products,produk_id',
        'kuantitas' => 'required|integer|min:1'
    ]);
    Log::info('Validasi berhasil.');

    try {
        $user = $request->user();
        Log::info('User ditemukan: ' . $user->user_id);

        $productId = $request->produk_id;
        $quantity = $request->kuantitas;

        $cartItem = Cart::where('user_id', $user->user_id)
            ->where('produk_id', $productId)
            ->first();

        if ($cartItem) {
            Log::info('Item sudah ada di keranjang, update kuantitas.');
            $cartItem->kuantitas += $quantity;
            $cartItem->save();
        } else {
            Log::info('Item belum ada, buat baru.');
            $cartItem = Cart::create([
                'user_id' => $user->user_id,
                'produk_id' => $productId,
                'kuantitas' => $quantity
            ]);
        }

        Log::info('Proses simpan/update ke database berhasil.');

        return response()->json([
            'status' => true,
            'message' => 'Item berhasil ditambahkan ke keranjang',
            'data' => $cartItem->load('product')
        ], 201);

    } catch (\Exception $e) {
        // Jika ada crash, ini akan tercatat
        Log::error('!!! ERROR SAAT PROSES CART: ' . $e->getMessage());
        return response()->json([
            'status' => false,
            'message' => 'Terjadi kesalahan pada server.',
            'error' => $e->getMessage()
        ], 500);
    }
}

    // Method destroy (tidak ada perubahan)
    public function destroy(Request $request, Cart $cart)
    {
        $user = $request->user();
        if ($cart->user_id !== $user->user_id) {
            return response()->json(['message' => 'Aksi tidak diizinkan.'], 403);
        }
        $cart->delete();
        return response()->json(['message' => 'Item berhasil dihapus dari keranjang.'], 200);
    }
}
