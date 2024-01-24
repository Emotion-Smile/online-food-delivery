<?php

namespace App\Http\Controllers\Api\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Delivery\DeliveryModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateStatusDeliveryController extends Controller
{
    public function __invoke(Request $request, int $deliveryId): JsonResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:assigned,en-route,delivered',
        ]);

        $delivery = DeliveryModel::findOrFail($deliveryId);
        $delivery->status = $validated['status'];
        $delivery->save();

        return response()->json($delivery);
    }
}
