<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromotionRequest;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PromotionController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $promotions = Promotion::latest()->paginate(10);
        return response()->json(['status' => true, 'data' => $promotions], 200);
    }

    public function store(StorePromotionRequest $request)
    {
        $this->authorize('create', Promotion::class);

        $promotion = Promotion::create($request->validated());

        return response()->json(['status' => true, 'message' => 'Promosi berhasil dibuat', 'data' => $promotion], 201);
    }

    public function show(Promotion $promotion)
    {
        return response()->json(['status' => true, 'data' => $promotion], 200);
    }

    public function update(StorePromotionRequest $request, Promotion $promotion)
    {
        $this->authorize('update', $promotion);

        $promotion->update($request->validated());

        return response()->json(['status' => true, 'message' => 'Promosi berhasil diupdate', 'data' => $promotion], 200);
    }

    public function destroy(Promotion $promotion)
    {
        $this->authorize('delete', $promotion);

        $promotion->delete();

        return response()->json(['status' => true, 'message' => 'Promosi berhasil dihapus'], 200);
    }
}
