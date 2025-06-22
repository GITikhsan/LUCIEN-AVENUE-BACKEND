<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Promotion;

class DashboardController extends Controller
{
    public function summary()
    {
        return response()->json([
            'total_products' => Product::count(),
            'total_promotions' => Promotion::count(),
            'stock_per_brand' => Product::select('brand')
                ->selectRaw('SUM(stok) as total_stock') // 👈 gunakan 'stok'
                ->groupBy('brand')
                ->pluck('total_stock', 'brand')
        ]);
    }

}
