<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class WilayahController extends Controller
{
    /**
     * Fungsi internal untuk mengambil data dari file JSON di storage.
     * @param string $path Path ke file JSON di dalam storage/app/
     * @return \Illuminate\Http\JsonResponse
     */
    private function getLocalWilayahData($path)
    {
        // Cek apakah file yang diminta ada di dalam storage/app/
        if (!Storage::exists($path)) {
            // Jika tidak ada, kirim response error 404 Not Found
            return response()->json(['message' => 'Data wilayah tidak ditemukan di server pada path: ' . $path], 404);
        }

        // Jika file ada, baca isinya
        $jsonContent = Storage::get($path);
        
        // Mengembalikan response JSON yang valid
        return response()->json(json_decode($jsonContent));
    }
    
    public function getProvinces()
    {
        // Path ini sudah benar, mencari file tunggal.
        // MEMBACA: storage/app/wilayah/provinces.json
        return $this->getLocalWilayahData('wilayah/provinces.json');
    }

    // Nama fungsi diubah agar lebih sesuai (opsional, tapi direkomendasikan)
    public function getCities($provinceId)
    {
        // [FIXED] Path diubah dari 'regencies' menjadi 'kota' agar sesuai dengan URL API
        // SEKARANG MEMBACA: storage/app/wilayah/kota/{provinceId}.json
        return $this->getLocalWilayahData("wilayah/kota/{$provinceId}.json");
    }
    
    public function getDistricts($regencyId)
    {
        // [FIXED] Path diubah dari 'districts' menjadi 'kecamatan' agar sesuai dengan URL API
        // SEKARANG MEMBACA: storage/app/wilayah/kecamatan/{regencyId}.json
        return $this->getLocalWilayahData("wilayah/kecamatan/{$regencyId}.json");
    }

    public function getVillages($districtId)
    {
        // [FIXED] Path diubah dari 'villages' menjadi 'desa' agar sesuai dengan URL API
        // SEKARANG MEMBACA: storage/app/wilayah/desa/{districtId}.json
        return $this->getLocalWilayahData("wilayah/desa/{$districtId}.json");
    }
}