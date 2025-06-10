<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Promotion; // GANTI DENGAN MODEL YANG SESUAI
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $data = Promotion::paginate(10);
        return response()->json(['status' => true, 'data' => $data], 200);
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        // TODO: Tambahkan validasi
        $data = Promotion::create($request->all());
        return response()->json(['status' => true, 'message' => 'Data Berhasil Dibuat', 'data' => $data], 201);
    }

    // Menampilkan satu data
    public function show(Promotion $promotion) // Ganti variabelnya
    {
        return response()->json(['status' => true, 'data' => $promotion], 200);
    }

    // Mengupdate data
    public function update(Request $request, Promotion $promotion)
    {
        // TODO: Tambahkan validasi
        $promotion->update($request->all());
        return response()->json(['status' => true, 'message' => 'Data Berhasil Diupdate', 'data' => $promotion], 200);
    }

    // Menghapus data
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return response()->json(['status' => true, 'message' => 'Data Berhasil Dihapus'], 200);
    }
}
