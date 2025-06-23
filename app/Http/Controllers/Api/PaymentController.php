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
    $request->validate([
        'amount' => 'required|numeric|min:1',
        'pesanan_id' => 'required|exists:orders,pesanan_id',
    ]);

    MidtransConfig::init();

    $order = Order::findOrFail($request->pesanan_id);

    // =======================================================
    // --- TAMBAHKAN BLOK PERBAIKAN INI ---
    // =======================================================
    // Jika total harga dari frontend (setelah diskon) berbeda dengan
    // yang tersimpan di database, update database dengan harga final.
    if ($order->jumlah_total != $request->amount) {
        $order->update(['jumlah_total' => $request->amount]);
    }
    // =======================================================
    // --- AKHIR DARI BLOK PERBAIKAN ---
    // =======================================================

    // Sekarang, kita lanjutkan proses dengan data yang sudah akurat
    $params = [
        'transaction_details' => [
            'order_id' => 'ORDER-' . $order->pesanan_id . '-' . time(),
            'gross_amount' => $request->amount,
        ],
        'customer_details' => [
            'first_name' => $request->name ?? 'Customer',
            'email' => $request->email ?? 'test@email.com',
        ],
    ];

    $snapToken = Snap::getSnapToken($params);

    Payment::create([
        'metode_pembayaran' => $request->metode_pembayaran ?? 'midtrans',
        'status_pembayaran' => 'pending',
        'jumlah'            => $request->amount,
        'pesanan_id'        => $order->pesanan_id,
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
        // Ambil data order dari relasi payment
        $order = $payment->order;

        // Pastikan order ditemukan
        if ($order) {
            // Update status pesanan menjadi 'dibayar'
            $order->update(['status_pesanan' => 'dibayar']);

            // --- TAMBAHKAN LOGIKA INI ---
            // Kosongkan keranjang milik user yang melakukan order ini
            \App\Models\Cart::where('user_id', $order->user_id)->delete();
        }
    }
        }

        return response()->json(['status' => 'success']);
    }
}
