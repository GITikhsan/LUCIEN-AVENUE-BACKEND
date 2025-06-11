<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Diasumsikan admin yang boleh
    }

    public function rules(): array
    {
        return [
            'nama_sepatu' => 'required|string|max:255',
            'brand' => 'nullable|string|max:100',
            'harga_retail' => 'required|numeric|min:0',
            'ukuran' => 'required|string|max:10',
            'warna' => 'required|string|max:50',
            'sku' => 'nullable|string|max:100|unique:products,sku',
            'diskon_id' => 'nullable|exists:discounts,diskon_id',
            'promo_id' => 'nullable|exists:promotions,promo_id',
        ];
    }
}
