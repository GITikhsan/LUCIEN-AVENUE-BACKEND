<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage; // <<< PENTING: TAMBAHKAN INI

class ProductController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // Menggunakan 'images' sesuai nama fungsi relasi di Model Product
        $products = Product::with(['images'])->latest()->paginate(10);
        return response()->json(['status' => true, 'data' => $products], 200);
    }

    public function store(StoreProductRequest $request)
    {
        // $validatedData akan berisi semua data dari request yang sudah lolos validasi,
        // KECUALI file upload itu sendiri. File harus diakses via $request->file().
        $validatedData = $request->validated();

        // Buat produk tanpa relasi gambar dulu
        // Pastikan $fillable di model Product sudah mencakup semua field non-gambar
        // yang dikirim dari $validatedData.
        $product = Product::create($validatedData);

        // --- REVISI UTAMA DI SINI UNTUK MENANGANI FILE UPLOAD ---
        if ($request->hasFile('images')) { // Cek apakah ada file yang diunggah dengan nama 'images'
            $productImagesData = [];
            foreach ($request->file('images') as $imageFile) {
                // Simpan setiap file ke direktori 'public/product_images' di storage Laravel
                // Contoh path: storage/app/public/product_images/nama_file_unik.jpg
                // Pastikan kamu sudah menjalankan 'php artisan storage:link' agar bisa diakses publik.
                $path = $imageFile->store('public/product_images');

                // Dapatkan URL yang bisa diakses publik
                // Misalnya: /storage/product_images/nama_file_unik.jpg
                $publicPath = Storage::url($path);

                $productImagesData[] = [
                    'image_path' => $publicPath // Simpan URL publik ini ke database
                ];
            }
            // Simpan banyak gambar sekaligus ke tabel product_images
            $product->images()->createMany($productImagesData);
        }
        // --- AKHIR REVISI UTAMA ---

        // Load kembali relasi 'images' agar data gambar ikut terkirim dalam respons
        $product->load('images');

        return response()->json([
            'status' => true,
            'message' => 'Produk Berhasil Dibuat',
            'data' => $product
        ], 201);
    }

    public function show(Product $product)
    {
        // Menggunakan 'images' sesuai nama fungsi relasi di Model Product
        $product->load(['images']);
        return response()->json(['status' => true, 'data' => $product], 200);
    }

    public function update(Request $request, Product $product)
    {
        // Untuk update file gambar, logikanya akan lebih kompleks:
        // 1. Validasi file baru (jika ada)
        // 2. Hapus file lama dari storage (jika diganti)
        // 3. Simpan file baru dan update path di database
        // Untuk sekarang, kita hanya update data produk non-gambar:
        $product->update($request->except('images')); // Hindari update kolom 'images' langsung

        // Jika Anda ingin mengizinkan update gambar juga, Anda perlu menambahkan validasi
        // dan logika penyimpanan file di sini, mirip dengan method store.
        // HATI-HATI! Jika ada 'images' di request, $request->except('images') akan menghapus
        // 'images' dari data update produk utama, yang benar.
        // Tapi kamu harus menambahkan logika terpisah untuk update gambar.
        if ($request->hasFile('images')) {
            // Contoh: Hapus semua gambar lama yang terkait dengan produk ini
            foreach ($product->images as $image) {
                $filePathInStorage = str_replace('storage/', 'public/', $image->image_path);
                if (Storage::exists($filePathInStorage)) {
                    Storage::delete($filePathInStorage);
                }
            }
            $product->images()->delete(); // Hapus entri di DB

            // Kemudian simpan gambar-gambar baru (mirip dengan logika store)
            $newProductImagesData = [];
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('public/product_images');
                $publicPath = Storage::url($path);
                $newProductImagesData[] = ['image_path' => $publicPath];
            }
            $product->images()->createMany($newProductImagesData);
        }

        $product->load('images');
        return response()->json(['status' => true, 'message' => 'Produk Berhasil Diupdate', 'data' => $product], 200);
    }

    public function destroy(Product $product)
    {
        // Sebaiknya otorisasi tetap ada untuk aksi berbahaya seperti delete
        // $this->authorize('delete', $product); // Uncomment jika Policy sudah diatur

        // --- PENTING: Hapus file fisik dari storage saat produk dihapus ---
        foreach ($product->images as $image) {
            // Asumsikan image_path disimpan sebagai URL 'storage/product_images/...'
            // Kita perlu mengubahnya kembali ke path di dalam 'storage/app/' untuk dihapus
            $filePathInStorage = str_replace('storage/', 'public/', $image->image_path);
            if (Storage::exists($filePathInStorage)) {
                Storage::delete($filePathInStorage);
            }
        }
        $product->images()->delete(); // Hapus entri di database product_images
        // --- Akhir logika hapus file ---

        $product->delete();
        return response()->json(['status' => true, 'message' => 'Produk Berhasil Dihapus'], 200);
    }
}
