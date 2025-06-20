<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromotionRequest;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PromotionController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        try {
            $promotions = Promotion::all();
            return response()->json([
                'data' => $promotions
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mengambil promo',
                'error' => $e->getMessage()
            ], 500);
        }
    }



    public function store(StorePromotionRequest $request)
    {
        $this->authorize('create', Promotion::class);

        $promotion = Promotion::create($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Promosi berhasil dibuat',
            'data' => $promotion
        ], 201);
    }

public function applyCoupon(Request $request)
{
    // Validasi input, ini sudah benar.
    $request->validate([
        'coupon_code' => 'required|string',
        'products' => 'required|array|min:1',
        'products.*.productId' => 'required|integer',
        'products.*.quantity' => 'required|integer|min:1',
    ]);

    // Mencari promosi, ini sudah benar.
    $promotion = Promotion::where('kode', strtoupper($request->coupon_code))
        ->where('selesai_tanggal', '>=', now())
        ->first();

    if (!$promotion) {
        return response()->json([
            'success' => false,
            'message' => 'Kupon tidak ditemukan atau sudah kedaluwarsa.'
        ], 404); // Status 404 lebih tepat untuk "tidak ditemukan"
    }

    // [FIX 1] Ekstrak 'productId' dari array objek menjadi array biasa.
    $productIds = collect($request->products)->pluck('productId')->all();

    // Ambil data produk dari database menggunakan array ID yang sudah benar.
    $productsFromDb = DB::table('products')
        ->whereIn('produk_id', $productIds)
        ->select('produk_id', 'harga_retail')
        ->get();

    if ($productsFromDb->isEmpty()) {
        return response()->json([
            'success' => false,
            'message' => 'Produk yang relevan dengan promo tidak ditemukan.'
        ], 404);
    }

    // Buat pemetaan dari productId ke kuantitasnya untuk kemudahan akses.
    $productQuantities = collect($request->products)->keyBy('productId');

    // [FIX 2] Hitung total harga dengan mengalikan harga satuan dan kuantitas.
    $originalTotal = 0;
    foreach ($productsFromDb as $product) {
        // Ambil kuantitas dari request, jika tidak ada default ke 1.
        $quantity = $productQuantities[$product->produk_id]['quantity'] ?? 1;
        $originalTotal += $product->harga_retail * $quantity;
    }

    // Perhitungan diskon dan total akhir sekarang akurat.
    $discount = ($promotion->diskonP / 100) * $originalTotal;
    $finalTotal = $originalTotal - $discount;

    // Hapus kupon setelah digunakan.
    $promotion->delete();

    // Kembalikan response dengan data yang sudah benar.
    return response()->json([
        'success' => true,
        'original_total' => round($originalTotal, 2),
        'discount' => round($discount, 2),
        'final_total' => round($finalTotal, 2),
        'applied_coupon' => $promotion->kode,
        'discount_percent' => $promotion->diskonP,
        'message' => 'Kupon berhasil digunakan dan telah dihapus dari sistem.'
    ]);
}
    public function show(Promotion $promotion)
    {
        $this->authorize('view', $promotion);

        return response()->json([
            'status' => true,
            'data' => $promotion
        ], 200);
    }

    public function update(StorePromotionRequest $request, Promotion $promotion)
    {
        $this->authorize('update', $promotion);

        $promotion->update($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Promosi berhasil diperbarui',
            'data' => $promotion
        ], 200);
    }

    public function destroy(Promotion $promotion)
    {
        $this->authorize('delete', $promotion);

        $promotion->delete();

        return response()->json([
            'status' => true,
            'message' => 'Promosi berhasil dihapus'
        ], 200);
    }
}
