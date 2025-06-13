<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiscountRequest;
use App\Models\Discount;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DiscountController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $discounts = Discount::latest()->paginate(10);
        return response()->json(['status' => true, 'data' => $discounts], 200);
    }

    public function store(StoreDiscountRequest $request)
    {
        // Cek hak akses menggunakan Policy
        $this->authorize('create', Discount::class);

        // Buat diskon baru dengan data yang sudah tervalidasi
        $discount = Discount::create($request->validated());

        return response()->json(['status' => true, 'message' => 'Diskon berhasil dibuat', 'data' => $discount], 201);
    }

    public function show(Discount $discount)
    {
        return response()->json(['status' => true, 'data' => $discount], 200);
    }

    public function update(StoreDiscountRequest $request, Discount $discount) // Bisa pakai request yang sama
    {
        $this->authorize('update', $discount);

        $discount->update($request->validated());

        return response()->json(['status' => true, 'message' => 'Diskon berhasil diupdate', 'data' => $discount], 200);
    }

    public function destroy(Discount $discount)
    {
        $this->authorize('delete', $discount);

        $discount->delete();

        return response()->json(['status' => true, 'message' => 'Diskon berhasil dihapus'], 200);
    }
}
