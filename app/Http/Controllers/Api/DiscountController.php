<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Discount; // GANTI DENGAN MODEL YANG SESUAI
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $data = Discount::paginate(10);
        return response()->json(['status' => true, 'data' => $data], 200);
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        // TODO: Tambahkan validasi
        $data = Discount::create($request->all());
        return response()->json(['status' => true, 'message' => 'Data Berhasil Dibuat', 'data' => $data], 201);
    }

    // Menampilkan satu data
    public function show(Discount $discount) // Ganti variabelnya
    {
        return response()->json(['status' => true, 'data' => $discount], 200);
    }

    // Mengupdate data
    public function update(Request $request, Discount $discount)
    {
        // TODO: Tambahkan validasi
        $discount->update($request->all());
        return response()->json(['status' => true, 'message' => 'Data Berhasil Diupdate', 'data' => $discount], 200);
    }

    // Menghapus data
    public function destroy(Discount $discount)
    {
        $discount->delete();
        return response()->json(['status' => true, 'message' => 'Data Berhasil Dihapus'], 200);
    }
}
