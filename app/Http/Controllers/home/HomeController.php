<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil beberapa produk yang akan ditampilkan di Home
        $featuredProducts = Product::latest()->take(8)->get(); // atau where('is_featured', true)

        return response()->json([
            'message' => 'Homepage content fetched successfully.',
            'data' => [
                'featured_products' => $featuredProducts
            ]
        ]);
    }
}
