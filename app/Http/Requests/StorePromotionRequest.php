<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePromotionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $promoId = $this->route('promotion') ? $this->route('promotion')->promo_id : null;

        return [
            'nama_promo' => 'required|string|max:255',
            'kode' => 'required|string|max:255|unique:promotions,kode,' . $promoId . ',promo_id',
            'diskonP' => 'required|numeric|min:0|max:100',
            'mulai_tanggal' => 'required|date',
            'selesai_tanggal' => 'required|date|after_or_equal:mulai_tanggal',
        ];
    }
}
