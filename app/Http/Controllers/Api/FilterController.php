<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;


    class FilterController extends Controller
    {

            public function filter(Request $request)
            {
                $query = \App\Models\Product::query();

                switch ($request->sort) {
                    case 'Price: Low to High':
                        $query->orderBy('harga_retail', 'asc');
                        break;
                    case 'Price: High to Low':
                        $query->orderBy('harga_retail', 'desc');
                        break;
                    case 'Newest':
                        $query->orderBy('tanggal_rilis', 'desc');
                        break;
                    case 'Featured Items':
                        $query->inRandomOrder();
                        break;
                    default:
                        $query->orderBy('produk_id', 'desc');
                }

                $products = $query->with('images')->get();
                return response()->json($products);
            }

        }
?>
