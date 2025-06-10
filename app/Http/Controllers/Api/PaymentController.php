<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $data = Payment::with('order')->paginate(10);
        return response()->json(['status' => true, 'data' => $data], 200);
    }

    public function show(Payment $payment)
    {
        return response()->json(['status' => true, 'data' => $payment->load('order')], 200);
    }
}
