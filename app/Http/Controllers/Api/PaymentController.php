<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Services\MidtransConfig;
use App\Models\Order;
use Midtrans\Snap;
use Midtrans\Notification;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    // Buat Snap Token dan Simpan Data Pembayaran
    public function makePayment(Request $request)
{
    MidtransConfig::init();

    // Mengambil data pesanan dari database
    // findOrFail akan error jika pesanan_id dari frontend tidak ditemukan
    $order = Order::findOrFail($request->pesanan_id);

    // Menyiapkan parameter untuk Midtrans
    // 'gross_amount' disesuaikan dengan nama kolom di tabel orders Anda ('jumlah_total')
    $params = [
        'transaction_details' => [
            'order_id' => 'ORDER-' . $order->pesanan_id . '-' . time(), // Dibuat lebih unik
            'gross_amount' => $order->jumlah_total, // BENAR: Menggunakan jumlah_total
        ],
        'customer_details' => [
            'first_name' => $request->name ?? 'Customer',
            'email' => $request->email ?? 'test@email.com',
        ],
    ];

    $snapToken = Snap::getSnapToken($params);

    // Menyimpan data ke tabel 'payments'
    // 'pesanan_id' dan 'jumlah' disesuaikan dengan nama kolom yang benar
    Payment::create([
        'metode_pembayaran' => $request->metode_pembayaran ?? 'midtrans',
        'status_pembayaran' => 'pending',
        'jumlah'            => $order->jumlah_total, // BENAR: Menggunakan jumlah_total
        'pesanan_id'        => $order->pesanan_id,   // BENAR: Menggunakan pesanan_id (bukan id)
    ]);

    return response()->json(['token' => $snapToken]);
}

    // Callback dari Midtrans
    public function callback(Request $request)
    {
        MidtransConfig::init();

        $notif = new Notification();

        $transaction = $notif->transaction_status;
        $orderId     = $notif->order_id;
        $grossAmount = $notif->gross_amount;

        // Ambil data pembayaran berdasarkan order_code
        $payment = Payment::where('order_code', $orderId)->first();

        if ($payment) {
            // Update status pembayaran
            $payment->status_pembayaran = $transaction;
            $payment->save();

            // Update status pesanan jika pembayaran sukses
            if ($transaction === 'settlement') {
                $payment->order->update([
                    'status_pesanan' => 'dibayar'
                ]);
            }
        }

        return response()->json(['status' => 'success']);
    }
}
