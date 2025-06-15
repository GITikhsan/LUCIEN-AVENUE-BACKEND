<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Bagian ini tidak diubah, tetap aman
        return $this->user()->can('create', \App\Models\Product::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Validasi lain tidak diubah, tetap aman
            'nama_sepatu'   => 'required|string|max:255',
            'brand'         => 'required|string',
            'harga_retail'  => 'required|numeric',
            'sku'           => 'required|string|unique:products,sku',
            'ukuran'        => 'required|string',
            'warna'         => 'required|string',
            'gender'        => 'nullable|string',
            'material'      => 'nullable|string',
            'dimensi'       => 'nullable|string',
            'tanggal_rilis' => 'nullable|date',
            'deskripsi'     => 'nullable|string',
            'images'   => 'nullable|array', // 'images' harus berupa array (boleh kosong)
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048' // Setiap item di dalam array 'images' harus berupa gambar dengan aturan ini.
        ];
    }
}
