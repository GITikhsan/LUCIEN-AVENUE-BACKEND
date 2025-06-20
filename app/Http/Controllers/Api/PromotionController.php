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
        $promotions = Promotion::latest()->paginate(10);
        return response()->json([
            'status' => true,
            'data' => $promotions
        ], 200);
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
    $request->validate([
        'coupon_code' => 'required|string',
        'products' => 'required|array|min:1',
        'products.*' => 'integer',
    ]);

    $promotion = Promotion::where('kode', strtoupper($request->coupon_code))
        ->where('selesai_tanggal', '>=', now())
        ->first();

    if (!$promotion) {
        return response()->json([
            'success' => false,
            'message' => 'Kupon tidak ditemukan atau sudah kedaluwarsa.'
        ], 400);
    }

    // Ambil produk berdasarkan produk_id
    $products = DB::table('products')
        ->whereIn('produk_id', $request->products)
        ->select('produk_id', 'harga_retail')
        ->get();

    if ($products->isEmpty()) {
        return response()->json([
            'success' => false,
            'message' => 'Produk tidak ditemukan.'
        ], 404);
    }

    $originalTotal = $products->sum('harga_retail');
    $discount = ($promotion->diskonP / 100) * $originalTotal;
    $finalTotal = $originalTotal - $discount;

    // Hapus kupon setelah digunakan
    $promotion->delete();

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
