<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// ↓↓↓ TAMBAHKAN DUA 'use' STATEMENT INI ↓↓↓
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_sepatu' => 'required|string|max:255',
            'brand' => 'required|string|max:100',
            'harga_retail' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'ukuran' => 'required|string',
            'warna' => 'required|string',
            'sku' => 'required|string|max:255',
            'gender' => 'nullable|string|max:255',
            'material' => 'nullable|string|max:255',
            'dimensi' => 'nullable|string|max:255',
            'stok' => 'required|numeric',
            'tanggal_rilis' => 'nullable|date',

            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
        ];
    }

    /**
     * ↓↓↓ TAMBAHKAN SELURUH FUNGSI BARU INI ↓↓↓
     *
     * Menangani proses ketika validasi gagal.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        // Jangan redirect, tapi lemparkan exception yang berisi respons JSON.
        throw new HttpResponseException(response()->json([
            'status'   => false,
            'message'  => 'Data yang diberikan tidak valid.',
            'errors' => $validator->errors()
        ], 422)); // Pastikan status code-nya 422
    }
}
