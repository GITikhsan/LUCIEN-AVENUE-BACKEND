<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
// Hapus import yang tidak perlu: Validator, Storage, ProductImage

class ProductController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // Menggunakan 'productImages' (plural) untuk konsistensi relasi hasMany
        $products = Product::with(['productImages', 'discount', 'promotion'])->latest()->paginate(10);
        return response()->json(['status' => true, 'data' => $products], 200);
    }

    public function store(StoreProductRequest $request)
    {
        // Otorisasi dinonaktifkan sementara sesuai permintaan awal
        $product = Product::create($request->validated());
        return response()->json(['status' => true, 'message' => 'Produk Berhasil Dibuat', 'data' => $product], 201);
    }

    public function show(Product $product)
    {
        $product->load(['productImages', 'discount', 'promotion']);
        return response()->json(['status' => true, 'data' => $product], 200);
    }

    public function update(Request $request, Product $product)
    {
        // Otorisasi dinonaktifkan sementara
        $product->update($request->all());
        return response()->json(['status' => true, 'message' => 'Produk Berhasil Diupdate', 'data' => $product], 200);
    }

    public function destroy(Product $product)
    {
        // Sebaiknya otorisasi tetap ada untuk aksi berbahaya seperti delete
        $this->authorize('delete', $product);

        // TODO: Tambahkan logika untuk menghapus semua gambar terkait dari storage
        $product->delete();
        return response()->json(['status' => true, 'message' => 'Produk Berhasil Dihapus'], 200);
    }

    // Metode uploadImage() telah dihapus dari sini
}
