<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\WilayahApiService;
use Illuminate\Http\JsonResponse;

class WilayahController extends Controller
{
    protected $wilayahService;

    public function __construct(WilayahApiService $wilayahService)
    {
        $this->wilayahService = $wilayahService;
    }

    /**
     * Helper untuk membuat respons API yang konsisten.
     */
    private function apiResponse(bool $success, string $message, $data = [], int $statusCode = 200): JsonResponse
    {
        // Memastikan 'data' selalu berupa array untuk konsistensi di frontend
        if (is_null($data)) {
            $data = [];
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
            'data'    => $data,
        ], $statusCode);
    }

    /**
     * Mengambil daftar semua provinsi.
     */
    public function provinsi(): JsonResponse
    {
        try {
            $responseFromService = $this->wilayahService->getProvinsi();
            // FIX: Mengambil array 'data' dari dalam respons service untuk menghindari nesting ganda.
            $provinces = $responseFromService['data'] ?? [];

            return $this->apiResponse(true, 'Data provinsi berhasil diambil', $provinces);
        } catch (\Exception $e) {
            // Jika terjadi error, kirim array kosong agar frontend tidak rusak.
            return $this->apiResponse(false, 'Gagal mengambil data provinsi: ' . $e->getMessage(), [], 500);
        }
    }

    /**
     * Mengambil daftar kabupaten/kota berdasarkan ID provinsi.
     */
    public function kabupaten($provinsiId): JsonResponse
    {
        try {
            $responseFromService = $this->wilayahService->getKabupaten($provinsiId);
            // FIX: Mengambil array 'data' dari dalam respons service.
            $regencies = $responseFromService['data'] ?? [];
            
            return $this->apiResponse(true, 'Data kabupaten berhasil diambil', $regencies);
        } catch (\Exception $e) {
            return $this->apiResponse(false, 'Gagal mengambil data kabupaten: ' . $e->getMessage(), [], 500);
        }
    }

    /**
     * Mengambil daftar kecamatan berdasarkan ID kabupaten/kota.
     */
    public function kecamatan($kabupatenId): JsonResponse
    {
        try {
            $responseFromService = $this->wilayahService->getKecamatan($kabupatenId);
            // FIX: Mengambil array 'data' dari dalam respons service.
            $districts = $responseFromService['data'] ?? [];

            return $this->apiResponse(true, 'Data kecamatan berhasil diambil', $districts);
        } catch (\Exception $e) {
            return $this->apiResponse(false, 'Gagal mengambil data kecamatan: ' . $e->getMessage(), [], 500);
        }
    }

    /**
     * Mengambil daftar kelurahan/desa berdasarkan ID kecamatan.
     */
    public function kelurahan($kecamatanId): JsonResponse
    {
        try {
            $responseFromService = $this->wilayahService->getKelurahan($kecamatanId);
            // FIX: Mengambil array 'data' dari dalam respons service.
            $villages = $responseFromService['data'] ?? [];

            return $this->apiResponse(true, 'Data kelurahan berhasil diambil', $villages);
        } catch (\Exception $e) {
            return $this->apiResponse(false, 'Gagal mengambil data kelurahan: ' . $e->getMessage(), [], 500);
        }
    }
}