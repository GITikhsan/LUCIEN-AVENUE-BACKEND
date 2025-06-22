<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class WilayahApiService
{
    private $baseUrl;
    
    public function __construct()
    {
        // Menggunakan URL GitHub yang stabil
        $this->baseUrl = 'https://raw.githubusercontent.com/emsifa/api-wilayah-indonesia/master/api';
    }

    private function fetchData(string $cacheKey, string $endpoint)
    {
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            // Menambahkan withoutVerifying() dan User-Agent untuk mengatasi masalah koneksi
            $response = Http::withoutVerifying()
                            ->withHeaders([
                                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36'
                            ])
                            ->timeout(20)
                            ->get($this->baseUrl . $endpoint);

            if ($response->successful()) {
                $data = $response->json();
                if (is_array($data) && !empty($data)) {
                    Cache::put($cacheKey, $data, 3600 * 24); // Cache 1 hari
                }
                return $data;
            }
            return [];

        } catch (\Exception $e) {
            report($e);
            return [];
        }
    }

    public function getProvinsi()
    {
        return $this->fetchData('provinsi_github_final', '/provinces.json');
    }

    public function getKabupaten($provinsiId)
    {
        return $this->fetchData("kabupaten_github_of_{$provinsiId}", "/regencies/{$provinsiId}.json");
    }

    public function getKecamatan($kabupatenId)
    {
        return $this->fetchData("kecamatan_github_of_{$kabupatenId}", "/districts/{$kabupatenId}.json");
    }

    public function getKelurahan($kecamatanId)
    {
        return $this->fetchData("kelurahan_github_of_{$kecamatanId}", "/villages/{$kecamatanId}.json");
    }
}