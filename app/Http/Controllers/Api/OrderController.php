<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Cart; // <-- PENTING: Tambahkan ini
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // <-- PENTING: Tambahkan ini


class OrderController extends Controller
{
    /**
     * INI ADALAH METHOD YANG DIPANGGIL OLEH HALAMAN CHECKOUT ANDA.
     * Logikanya diubah untuk mengambil data dari CART, bukan dari ORDER.
     */
    public function getSummaryForCheckout(Request $request)
    {
        Log::info('--- [Checkout] Memulai proses getSummaryForCheckout ---');

        $user = $request->user();
        if (!$user) {
            Log::error('[Checkout] Gagal, user tidak terautentikasi.');
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }
        Log::info('[Checkout] User terautentikasi: ' . $user->user_id);

        // Mengambil semua item dari KERANJANG BELANJA (CART) user
        $cartItems = Cart::with('product.images')->where('user_id', $user->user_id)->get();
        Log::info('[Checkout] Menemukan ' . $cartItems->count() . ' item di keranjang.');

        // Jika keranjang kosong, kirim pesan error yang benar
        if ($cartItems->isEmpty()) {
            Log::warning('[Checkout] Keranjang kosong untuk User ID ' . $user->user_id);
            return response()->json(['message' => 'Your cart is empty. Please add items before checking out.'], 400);
        }

        // Menghitung total dan memformat data agar sesuai dengan Checkout.vue
        $grandTotal = 0;

        $productsForCheckout = $cartItems->map(function ($item) use (&$grandTotal) {
            if (!$item->product) return null; // Keamanan jika produk terhapus

            // Gunakan nama kolom 'harga_retail' yang sudah benar dari CartController Anda
            $price = $item->product->harga_retail ?? 0;
            $subtotal = $price * $item->kuantitas;
            $grandTotal += $subtotal;

            // Format data sesuai yang dibutuhkan v-for di Checkout.vue
            return [
    'productId'   => $item->product->produk_id,
    'nama_sepatu' => $item->product->nama_sepatu,
    'quantity'    => $item->kuantitas,
    'price'       => $price,
    'size'        => $item->product->size,
    'images'      => $item->product->images->map(function ($img) {
        return [
            'image_path' => $img->image_path
        ];
    })->toArray(),
];
        })->filter(); // Hapus item null

        // Asumsi ongkir, bisa dikembangkan
        $shippingCost = 15000;

        // Data final yang akan dikirim sebagai JSON
        $finalData = [
            'products'     => $productsForCheckout,
            'subtotal'     => $grandTotal,
            // 'shippingCost' => $shippingCost,
            'total'        => $grandTotal
            // + $shippingCost
        ];

        Log::info('[Checkout] Berhasil membuat summary. Mengirim data ke frontend.');
        return response()->json($finalData);
    }

    // --- Method-method lain untuk mengelola 'orders' bisa tetap di sini ---
    // (index, store, show, dll.)

    public function index(Request $request)
    {
        $userId = $request->user()->user_id;
        $orders = Order::where('user_id', $userId)
                         ->with(['items.product'])
                         ->latest()
                         ->get();
        return response()->json(['data' => $orders], 200);
    }

    // Anda bisa menambahkan method 'store' di sini nanti untuk membuat pesanan
    // setelah user menekan tombol "Bayar Sekarang".
}
