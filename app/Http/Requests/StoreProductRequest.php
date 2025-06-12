<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Izinkan request jika pengguna sudah login atau punya hak akses
        // Ganti 'create' dengan nama permission di Policy Anda jika berbeda
        return $this->user()->can('create', \App\Models\Product::class);
    }

    public function rules(): array
    {
        return [
            'nama_sepatu' => 'required|string|max:255',
            'brand' => 'required|string',
            'harga_retail' => 'required|numeric',
            'sku' => 'required|string|unique:products,sku',
            'ukuran' => 'required|string',
            'warna' => 'required|string',
            'gender' => 'nullable|string',
            'material' => 'nullable|string',
            'dimensi' => 'nullable|string',
            'tanggal_rilis' => 'nullable|date',
            'deskripsi' => 'nullable|string',
            // Validasi untuk gambar: boleh kosong, harus gambar, tipe tertentu, maks 2MB
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ];
    }
}