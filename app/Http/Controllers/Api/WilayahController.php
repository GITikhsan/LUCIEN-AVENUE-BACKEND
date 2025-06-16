<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class WilayahController extends Controller
{
    private $baseUrl = 'https://emsifa.github.io/api-wilayah-indonesia/api/';

    public function getProvinces()
    {
        try {
            $response = Http::get($this->baseUrl . 'provinces.json');
            if (!$response->successful()) {
                return response()->json(['message' => 'Gagal mengambil data provinsi.'], 502);
            }
            return $response->json();
        } catch (ConnectionException $e) {
            report($e);
            return response()->json(['message' => 'Tidak bisa terhubung ke server data wilayah.'], 504);
        }
    }

    public function getRegencies($provinceId)
    {
        try {
            $response = Http::get($this->baseUrl . "regencies/{$provinceId}.json");
            if (!$response->successful()) {
                return response()->json(['message' => 'Gagal mengambil data kota.'], 502);
            }
            return $response->json();
        } catch (ConnectionException $e) {
            report($e);
            return response()->json(['message' => 'Tidak bisa terhubung ke server data wilayah.'], 504);
        }
    }

    /**
     * PERBAIKAN: Nama method dan parameter disesuaikan dengan rute
     */
    public function getDistricts($regencyId)
    {
        try {
            // PERBAIKAN: URL API sekarang memanggil endpoint 'districts'
            $response = Http::get($this->baseUrl . "districts/{$regencyId}.json");
            if (!$response->successful()) {
                return response()->json(['message' => 'Gagal mengambil data Kecamatan.'], 502);
            }
            return $response->json();
        } catch (ConnectionException $e) {
            report($e);
            return response()->json(['message' => 'Tidak bisa terhubung ke server data wilayah.'], 504);
        }
    }

    /**
     * PERBAIKAN: Nama method dan parameter disesuaikan dengan rute
     */
    public function getVillages($districtId)
    {
        try {
            // PERBAIKAN: URL API sekarang memanggil endpoint 'villages'
            $response = Http::get($this->baseUrl . "villages/{$districtId}.json");
            if (!$response->successful()) {
                return response()->json(['message' => 'Gagal mengambil data Desa.'], 502);
            }
            return $response->json();
        } catch (ConnectionException $e) {
            report($e);
            return response()->json(['message' => 'Tidak bisa terhubung ke server data wilayah.'], 504);
        }
    }
}