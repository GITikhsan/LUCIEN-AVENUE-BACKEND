<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiscountRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Otorisasi sudah ditangani oleh Policy, jadi di sini kita set true.
        return true;
    }

    public function rules(): array
    {
        return [
            'diskon' => 'required|numeric|min:1|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ];
    }
}
