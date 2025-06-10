<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Management; // GANTI DENGAN MODEL YANG SESUAI
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $data = Management::paginate(10);
        return response()->json(['status' => true, 'data' => $data], 200);
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        // TODO: Tambahkan validasi
        $data = Management::create($request->all());
        return response()->json(['status' => true, 'message' => 'Data Berhasil Dibuat', 'data' => $data], 201);
    }

    // Menampilkan satu data
    public function show(Management $management) // Ganti variabelnya
    {
        return response()->json(['status' => true, 'data' => $management], 200);
    }

    // Mengupdate data
    public function update(Request $request, Management $management)
    {
        // TODO: Tambahkan validasi
        $management->update($request->all());
        return response()->json(['status' => true, 'message' => 'Data Berhasil Diupdate', 'data' => $management], 200);
    }

    // Menghapus data
    public function destroy(Management $management)
    {
        $management->delete();
        return response()->json(['status' => true, 'message' => 'Data Berhasil Dihapus'], 200);
    }
}
