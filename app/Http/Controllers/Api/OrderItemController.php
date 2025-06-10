<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderItem; // GANTI DENGAN MODEL YANG SESUAI
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $data = OrderItem::paginate(10);
        return response()->json(['status' => true, 'data' => $data], 200);
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        // TODO: Tambahkan validasi
        $data = OrderItem::create($request->all());
        return response()->json(['status' => true, 'message' => 'Data Berhasil Dibuat', 'data' => $data], 201);
    }

    // Menampilkan satu data
    public function show(OrderItem $order_item) // Ganti variabelnya
    {
        return response()->json(['status' => true, 'data' => $order_item], 200);
    }

    // Mengupdate data
    public function update(Request $request, OrderItem $order_item)
    {
        // TODO: Tambahkan validasi
        $order_item->update($request->all());
        return response()->json(['status' => true, 'message' => 'Data Berhasil Diupdate', 'data' => $order_item], 200);
    }

    // Menghapus data
    public function destroy(OrderItem $order_item)
    {
        $order_item->delete();
        return response()->json(['status' => true, 'message' => 'Data Berhasil Dihapus'], 200);
    }
}
