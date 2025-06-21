<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Client\RequestException;

class WilayahApiService
{
    private $baseUrl;

    public function __construct()
    {
        // MENGGUNAKAN SUMBER API BARU YANG LEBIH STABIL
        $this->baseUrl = 'https://farizdotid.com/api/daerah';
    }

    // di dalam file WilayahApiService.php

    public function getProvinsi()
    {
        $cacheKey = 'provinsi_farizdotid';
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            $response = Http::timeout(20)->get($this->baseUrl . '/provinsi');

            // --- TAMBAHKAN BARIS INI UNTUK MELIHAT DATA MENTAH ---
            dd($response->json()); 

            // Kode di bawah ini tidak akan sempat dijalankan karena dd()
            $response->throw();

            $data = $response->json()['provinsi'] ?? [];

            if (!empty($data)) {
                Cache::put($cacheKey, $data, 3600 * 24);
            }
            return $data;

        } catch (\Exception $e) {
            report($e);
            return [];
        }
    }

    public function getKabupaten($provinsiId)
    {
        $cacheKey = "kabupaten_of_{$provinsiId}_farizdotid";
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            $response = Http::timeout(20)->get($this->baseUrl . "/kota?id_provinsi={$provinsiId}");
            $response->throw();

            // API ini membungkus hasilnya di dalam key 'kota_kabupaten'
            $data = $response->json()['kota_kabupaten'] ?? [];

            if (!empty($data)) {
                Cache::put($cacheKey, $data, 3600 * 24);
            }
            return $data;

        } catch (\Exception $e) {
            report($e);
            return [];
        }
    }

    public function getKecamatan($kabupatenId)
    {
        // Nama kolom di API ini adalah 'id' dan 'nama'
        // Sementara di frontend kita menggunakan 'id' dan 'name'.
        // Service ini akan mengubahnya agar cocok.
        $cacheKey = "kecamatan_of_{$kabupatenId}_farizdotid";
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            $response = Http::timeout(20)->get($this->baseUrl . "/kecamatan?id_kota={$kabupatenId}");
            $response->throw();

            $dataApi = $response->json()['kecamatan'] ?? [];
            $formattedData = [];
            foreach ($dataApi as $item) {
                $formattedData[] = [
                    'id' => $item['id'],
                    'name' => $item['nama'] // Mengubah 'nama' menjadi 'name'
                ];
            }

            if (!empty($formattedData)) {
                Cache::put($cacheKey, $formattedData, 3600 * 24);
            }
            return $formattedData;

        } catch (\Exception $e) {
            report($e);
            return [];
        }
    }

    public function getKelurahan($kecamatanId)
    {
        $cacheKey = "kelurahan_of_{$kecamatanId}_farizdotid";
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            $response = Http::timeout(20)->get($this->baseUrl . "/kelurahan?id_kecamatan={$kecamatanId}");
            $response->throw();

            $dataApi = $response->json()['kelurahan'] ?? [];
            $formattedData = [];
            foreach ($dataApi as $item) {
                $formattedData[] = [
                    'id' => $item['id'],
                    'name' => $item['nama'] // Mengubah 'nama' menjadi 'name'
                ];
            }

            if (!empty($formattedData)) {
                Cache::put($cacheKey, $formattedData, 3600 * 24);
            }
            return $formattedData;

        } catch (\Exception $e) {
            report($e);
            return [];
        }
    }
}