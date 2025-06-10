<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderReturn; // GANTI DENGAN MODEL YANG SESUAI
use Illuminate\Http\Request;

class OrderReturnController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $data = OrderReturn::paginate(10);
        return response()->json(['status' => true, 'data' => $data], 200);
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        // TODO: Tambahkan validasi
        $data = OrderReturn::create($request->all());
        return response()->json(['status' => true, 'message' => 'Data Berhasil Dibuat', 'data' => $data], 201);
    }

    // Menampilkan satu data
    public function show(OrderReturn $order_return) // Ganti variabelnya
    {
        return response()->json(['status' => true, 'data' => $order_return], 200);
    }

    // Mengupdate data
    public function update(Request $request, OrderReturn $order_return)
    {
        // TODO: Tambahkan validasi
        $order_return->update($request->all());
        return response()->json(['status' => true, 'message' => 'Data Berhasil Diupdate', 'data' => $order_return], 200);
    }

    // Menghapus data
    public function destroy(OrderReturn $order_return)
    {
        $order_return->delete();
        return response()->json(['status' => true, 'message' => 'Data Berhasil Dihapus'], 200);
    }
}
