<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Pastikan ini di-import
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductController extends Controller
{
    use AuthorizesRequests;

    /**
     * Menampilkan daftar semua produk.
     * DISESUAIKAN: Sekarang kita juga mengambil data gambar-gambarnya.
     */
    public function index()
    {
        // Gunakan ->with('images') untuk mengambil relasi gambar
        $products = Product::with(['images', 'discount', 'promotion'])->latest()->paginate(10);
        return response()->json(['status' => true, 'data' => $products], 200);
    }

    /**
     * Menyimpan produk baru beserta banyak gambarnya.
     * DIUBAH TOTAL: Logika ini sekarang menangani array gambar.
     */
    public function store(StoreProductRequest $request)
    {
        // Authorize sudah ditangani oleh StoreProductRequest

        $validatedData = $request->validated();

        // 1. Buat produk utamanya dulu, TANPA gambar.
        // Kita pisahkan data gambar dari data utama.
        $product = Product::create($validatedData);

        // 2. Cek jika ada file gambar yang di-upload (sekarang 'images' dalam bentuk array)
        if ($request->hasFile('images')) {
            // Lakukan perulangan untuk setiap file gambar yang di-upload
            foreach ($request->file('images') as $imageFile) {
                // Simpan setiap file gambar ke storage/app/public/products
                $path = $imageFile->store('products', 'public');

                // Buat entri baru di tabel product_images yang terhubung dengan produk ini
                // Ini adalah cara elegan menggunakan relasi yang sudah kita buat
                $product->images()->create([
                    'path' => $path
                ]);
            }
        }

        // Muat ulang relasi gambar agar data yang dikembalikan ke frontend lengkap
        $product->load('images');

        return response()->json(['status' => true, 'message' => 'Produk Berhasil Dibuat', 'data' => $product], 201);
    }

    /**
     * Menampilkan satu produk detail.
     * DISESUAIKAN: Sekarang kita juga mengambil data gambar-gambarnya.
     */
    public function show(Product $product)
    {
        // Muat semua relasi yang diperlukan, termasuk 'images'
        $product->load(['images', 'discount', 'promotion']);
        return response()->json(['status' => true, 'data' => $product], 200);
    }

    /**
     * Mengupdate produk yang sudah ada.
     * DIUBAH: Logika update gambar juga disesuaikan.
     * CATATAN: Logika update multi-gambar bisa kompleks (menambah, menghapus, mengganti).
     * Ini adalah contoh sederhana "hapus semua gambar lama, ganti dengan yang baru".
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->authorize('update', $product);

        // Update data utama produk
        $product->update($request->validated());

        // Cek jika ada file gambar baru yang di-upload untuk menggantikan yang lama
        if ($request->hasFile('images')) {
            // 1. Hapus semua gambar lama dari storage
            foreach ($product->images as $oldImage) {
                Storage::disk('public')->delete($oldImage->path);
            }

            // 2. Hapus semua record gambar lama dari database
            $product->images()->delete();

            // 3. Upload dan simpan gambar-gambar yang baru (logika sama seperti store)
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('products', 'public');
                $product->images()->create(['path' => $path]);
            }
        }

        // Muat ulang data produk dengan gambar terbarunya
        $product->load('images');

        return response()->json(['status' => true, 'message' => 'Produk Berhasil Diupdate', 'data' => $product], 200);
    }

    /**
     * Menghapus produk.
     * DISESUAIKAN: Pastikan semua file gambar di storage juga ikut terhapus.
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);

        // Hapus semua file gambar yang terhubung dengan produk ini dari storage
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->path);
        }

        // Hapus produk dari database. Karena ada onDelete('cascade'),
        // semua record di product_images akan otomatis terhapus juga.
        $product->delete();

        return response()->json(['status' => true, 'message' => 'Produk Berhasil Dihapus'], 204);
    }
}
