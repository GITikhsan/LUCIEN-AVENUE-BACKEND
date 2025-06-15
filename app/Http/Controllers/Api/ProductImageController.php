<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // <-- Tambahkan ini

class ProductImageController extends Controller
{
    use AuthorizesRequests; // <-- Tambahkan ini

    public function index()
    {
        $this->authorize('viewAny', ProductImage::class);
        $images = ProductImage::latest()->paginate(10);
        return response()->json(['status' => true, 'data' => $images], 200);
    }

    public function store(Request $request)
    {
        $this->authorize('create', ProductImage::class);

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'image'      => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan file gambar dan dapatkan path-nya
        $path = $request->file('image')->store('public/product_images');

        $image = ProductImage::create([
            'product_id' => $request->product_id,
            'image_path' => Storage::url($path), // Simpan URL yang dapat diakses publik
        ]);

        return response()->json(['status' => true, 'message' => 'Gambar Berhasil Diunggah', 'data' => $image], 201);
    }

    public function show(ProductImage $productImage)
    {
        $this->authorize('view', $productImage);
        return response()->json(['status' => true, 'data' => $productImage], 200);
    }

    // Metode update biasanya tidak digunakan untuk gambar, lebih umum hapus dan tambah baru.
    // Jadi, saya akan melewati implementasi update.

    public function destroy(ProductImage $productImage)
    {
        $this->authorize('delete', $productImage);

        // Hapus file dari storage
        // Mengonversi URL publik kembali ke path storage internal
        $path = str_replace('/storage', 'public', $productImage->image_path);
        if (Storage::exists($path)) {
            Storage::delete($path);
        }

        // Hapus record dari database
        $productImage->delete();

        return response()->json(['status' => true, 'message' => 'Gambar Berhasil Dihapus'], 200);
    }
}
