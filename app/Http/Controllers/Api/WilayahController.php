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

    private function apiResponse(bool $success, string $message, $data = []): JsonResponse
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data'    => $data ?? [],
        ]);
    }

    public function provinsi(): JsonResponse
    {
        try {
            $data = $this->wilayahService->getProvinsi();
            return $this->apiResponse(true, 'Data provinsi berhasil diambil', $data);
        } catch (\Exception $e) {
            return $this->apiResponse(false, 'Gagal mengambil data provinsi: ' . $e->getMessage());
        }
    }

    public function kabupaten($provinsiId): JsonResponse
    {
        $data = $this->wilayahService->getKabupaten($provinsiId);
        return $this->apiResponse(true, 'Data kabupaten berhasil diambil', $data);
    }

    public function kecamatan($kabupatenId): JsonResponse
    {
        $data = $this->wilayahService->getKecamatan($kabupatenId);
        return $this->apiResponse(true, 'Data kecamatan berhasil diambil', $data);
    }

    public function kelurahan($kecamatanId): JsonResponse
    {
        $data = $this->wilayahService->getKelurahan($kecamatanId);
        return $this->apiResponse(true, 'Data kelurahan berhasil diambil', $data);
    }
}