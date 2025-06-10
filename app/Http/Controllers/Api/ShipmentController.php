<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shipment; // GANTI DENGAN MODEL YANG SESUAI
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $data = Shipment::paginate(10);
        return response()->json(['status' => true, 'data' => $data], 200);
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        // TODO: Tambahkan validasi
        $data = Shipment::create($request->all());
        return response()->json(['status' => true, 'message' => 'Data Berhasil Dibuat', 'data' => $data], 201);
    }

    // Menampilkan satu data
    public function show(Shipment $shipment) // Ganti variabelnya
    {
        return response()->json(['status' => true, 'data' => $shipment], 200);
    }

    // Mengupdate data
    public function update(Request $request, Shipment $shipment)
    {
        // TODO: Tambahkan validasi
        $shipment->update($request->all());
        return response()->json(['status' => true, 'message' => 'Data Berhasil Diupdate', 'data' => $shipment], 200);
    }

    // Menghapus data
    public function destroy(Shipment $shipment)
    {
        $shipment->delete();
        return response()->json(['status' => true, 'message' => 'Data Berhasil Dihapus'], 200);
    }
}
