<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Cart; // <-- PENTING: Tambahkan ini
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // <-- PENTING: Tambahkan ini
use App\Models\OrderItem;
use App\Models\Product;

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
    $user = $request->user();

    // Ambil SEMUA pesanan milik user ini, urutkan dari yang paling baru
    $orders = \App\Models\Order::where('user_id', $user->user_id)
        ->where('is_hidden', false)
        ->with('items.product.images')
        ->latest() // Mengurutkan dari yang terbaru (sama dengan ->orderBy('created_at', 'desc'))
        ->get();

    return response()->json($orders);
}

    public function storeOrderFromCart(Request $request)
    {
        // 1. Validasi input dari frontend
        $request->validate([
            'final_total' => 'required|numeric|min:0',
            'discount'    => 'required|numeric|min:0',
            // Anda bisa menambahkan validasi kode promo jika frontend juga mengirimkannya
            'promotion_code' => 'nullable|string',
        ]);

        $user = $request->user();
        $cartItems = Cart::with('product')->where('user_id', $user->user_id)->get();

        if ($cartItems->isEmpty()) {
            return response()->json(['message' => 'Keranjang kosong.'], 400);
        }

        // --- INI BAGIAN YANG DIPERBAIKI ---

        // 2. Gunakan data dari request, BUKAN menghitung ulang
        $finalTotal = $request->input('final_total');
        $discountAmount = $request->input('discount');
        $promotionCode = $request->input('promotion_code'); // Ambil kode promo jika ada

        // Mulai database transaction untuk keamanan
        DB::beginTransaction();
        try {
            // 3. Buat order dengan data yang sudah benar
            $order = Order::create([
                'user_id'           => $user->user_id,
                'jumlah_total'      => $finalTotal, // <-- BENAR: Gunakan total akhir
                'status_pesanan'    => 'pending',
                'discount'          => $discountAmount, // <-- BARU: Simpan jumlah diskon
                'promotion_code'    => $promotionCode,  // <-- BARU: Simpan kode promo yang dipakai
                'subtotal'          => $finalTotal + $discountAmount, // <-- BARU: Hitung subtotal
            ]);

            // 4. Pindahkan item dari keranjang ke order_items
            foreach ($cartItems as $item) {
                if (!$item->product) continue;

                OrderItem::create([
                    'pesanan_id' => $order->pesanan_id,
                    'produk_id'  => $item->produk_id,
                    'quantity'   => $item->kuantitas,
                    'harga'      => $item->product->harga_retail,
                ]);

                // Kurangi stok produk (PENTING!)
                $item->product->decrement('stok', $item->kuantitas);
            }

            // 5. Kosongkan keranjang user
            Cart::where('user_id', $user->user_id)->delete();

            // Selesaikan transaksi
            DB::commit();

            return response()->json([
                'message'    => 'Pesanan berhasil dibuat.',
                'pesanan_id' => $order->pesanan_id // Kirim ID untuk proses pembayaran
            ], 201);

        } catch (\Exception $e) {
            // Jika ada error, batalkan semua operasi database
            DB::rollBack();

            // Kirim pesan error
            return response()->json([
                'message' => 'Terjadi kesalahan saat membuat pesanan.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

public function cancelOrder(Request $request, Order $order)
{
    // 1. Otorisasi: Pastikan user yang request adalah pemilik order
   if ($request->user()->user_id !== $order->user_id) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    // 2. Validasi: Pastikan hanya order 'pending' yang bisa dibatalkan
    if ($order->status_pesanan !== 'pending') {
        return response()->json(['message' => 'Hanya pesanan yang masih pending yang bisa dibatalkan.'], 422);
    }

    // 3. Logika Mengembalikan Stok (Sangat Penting)
    // Kita ambil semua item dari pesanan ini
    foreach ($order->items as $item) {
        // Cari produk terkait
        $product = Product::find($item->produk_id);
        if ($product) {
            // Tambahkan kembali stoknya
            $product->increment('stok', $item->quantity); // Asumsi nama kolom stok adalah 'stok'
        }
    }

    // 4. Ubah status pesanan menjadi 'dibatalkan'
    $order->update(['status_pesanan' => 'dibatalkan']);

    // 5. Beri respons berhasil
    return response()->json([
        'message' => 'Pesanan berhasil dibatalkan.',
        'order' => $order, // Kirim data order yang sudah diupdate
    ]);
}

public function destroy(Request $request, Order $order)
{
    // 1. Otorisasi: Pastikan user adalah pemilik order
    if ($request->user()->user_id !== $order->user_id) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    // 2. Validasi: Hanya order yang sudah selesai/batal yang bisa disembunyikan
    if (!in_array($order->status_pesanan, ['dibayar', 'dibatalkan', 'selesai'])) { // Ganti 'selesai' jika Anda punya status lain
        return response()->json(['message' => 'Hanya pesanan yang sudah selesai atau dibatalkan yang bisa dihapus dari riwayat.'], 422);
    }

    // 3. Aksi: Update kolom is_hidden menjadi true
    $order->update(['is_hidden' => true]);

    return response()->json(['message' => 'Riwayat pesanan berhasil dihapus.']);
}
    // Anda bisa menambahkan method 'store' di sini nanti untuk membuat pesanan
    // setelah user menekan tombol "Bayar Sekarang".
}
