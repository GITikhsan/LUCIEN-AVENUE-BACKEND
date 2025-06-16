<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->user()->user_id;
        $orders = Order::where('user_id', $userId)
                        ->with(['items.product'/*, 'payment', 'shipment'*/]) // <-- Mengambil data terkait
                        ->latest() // Urutkan dari yang terbaru
                        ->get();

        return response()->json([/*'status' => true,*/ 'data' => $orders], 200);
    }


   public function getSummaryForCheckout(Request $request)
    {
        try {
            $user = $request->user();

            // PERBAIKAN: Menambahkan pengecekan user untuk mencegah 'user_id is null'
            if (!$user) {
                return response()->json(['message' => 'User tidak terautentikasi.'], 401);
            }

            // Kueri ini sekarang akan berjalan dengan benar karena kolom 'status' sudah ada
            $order = Order::where('user_id', $user->id)
                          ->where('status', 'pending')
                          ->with('products') // Asumsi relasi 'products' sudah didefinisikan di model Order
                          ->latest()
                          ->first();

            // PENTING: Pastikan ada data pesanan 'pending' untuk user ini di database Anda
            if (!$order) {
                return response()->json(['message' => 'Tidak ada pesanan aktif untuk checkout.'], 404);
            }

            return response()->json($order);

        } catch (\Exception $e) {
            // Jaring pengaman ini akan menangkap error lain yang mungkin muncul
            return response()->json([
                'message' => 'Terjadi kesalahan internal saat mengambil ringkasan pesanan.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function store(Request $request)
    {
        // TODO: Logika pembuatan pesanan yang sesungguhnya lebih kompleks.
        // Ini adalah contoh sederhana.
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'jumlah_total' => 'required|numeric',
            'status_pesanan' => 'required|string',
            // ... validasi untuk items, payment, shipment
        ]);

        $order = DB::transaction(function () use ($validated, $request) {
            $order = Order::create($validated);
            // TODO: logic untuk menyimpan order_items
            // TODO: logic untuk menyimpan payment
            // TODO: logic untuk menyimpan shipment
            return $order;
        });

        return response()->json(['status' => true, 'message' => 'Pesanan Berhasil Dibuat', 'data' => $order], 201);
    }

    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $order->load(['user', 'items.product', 'payment', 'shipment', 'orderReturn']);
        return response()->json(['status' => true, 'data' => $order], 200);
    }

    public function update(Request $request, Order $order)
    {
        // Biasanya yang diupdate hanya statusnya
        $validated = $request->validate(['status_pesanan' => 'required|string']);
        $order->update($validated);
        return response()->json(['status' => true, 'message' => 'Pesanan Berhasil Diupdate', 'data' => $order], 200);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(['status' => true, 'message' => 'Pesanan Berhasil Dihapus'], 200);
    }
}
