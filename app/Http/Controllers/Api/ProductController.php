<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest; // Sebaiknya buat ini juga
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // <-- WAJIB: Tambahkan import untuk Storage
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // Saya nonaktifkan 'productImage' untuk fokus pada kolom 'image'
        $products = Product::with(['discount', 'promotion'])->latest()->paginate(10);
        return response()->json(['status' => true, 'data' => $products], 200);
    }

    public function store(StoreProductRequest $request)
    {
        // Authorize sudah ditangani oleh StoreProductRequest

        $validatedData = $request->validated();

        // Cek jika ada file gambar yang di-upload dari frontend
        if ($request->hasFile('image')) {
            // Simpan gambar ke storage/app/public/products
            $path = $request->file('image')->store('products', 'public');
            // Simpan URL publiknya ke database
            $validatedData['image'] = Storage::url($path);
        }

        $product = Product::create($validatedData);

        return response()->json(['status' => true, 'message' => 'Produk Berhasil Dibuat', 'data' => $product], 201);
    }

    public function show(Product $product)
    {
        // Saya nonaktifkan 'productImage' untuk fokus pada kolom 'image'
        $product->load(['discount', 'promotion']);
        return response()->json(['status' => true, 'data' => $product], 200);
    }

    // Sebaiknya ganti Request dengan UpdateProductRequest yang sudah divalidasi
    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);

        // Lakukan validasi di sini jika belum membuat UpdateProductRequest
        $validatedData = $request->validate([
            'nama_sepatu' => 'sometimes|required|string|max:255',
            'sku' => 'sometimes|required|string|unique:products,sku,' . $product->produk_id . ',produk_id',
            // ... validasi lain ...
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        // Cek jika ada file gambar baru yang di-upload
        if ($request->hasFile('image')) {
            // 1. Hapus gambar lama dari storage jika ada
            if ($product->image) {
                // Konversi URL (/storage/...) menjadi path (public/...) untuk dihapus
                $oldPath = str_replace('/storage', 'public', $product->image);
                Storage::delete($oldPath);
            }

            // 2. Simpan gambar baru dan dapatkan URL-nya
            $path = $request->file('image')->store('products', 'public');
            $validatedData['image'] = Storage::url($path);
        }

        $product->update($validatedData);

        return response()->json(['status' => true, 'message' => 'Produk Berhasil Diupdate', 'data' => $product], 200);
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);

        // Hapus gambar yang terhubung dengan produk ini dari storage
        if ($product->image) {
            $path = str_replace('/storage', 'public', $product->image);
            Storage::delete($path);
        }

        $product->delete();

        // Sesuai konvensi, hapus berhasil sebaiknya mengembalikan status 204 No Content
        return response()->json(['status' => true, 'message' => 'Produk Berhasil Dihapus'], 204);
    }
}
