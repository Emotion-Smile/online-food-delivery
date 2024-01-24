<?php

namespace App\Http\Controllers\Api\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Delivery\DeliveryModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TrackDeliveryController extends Controller
{
    public function __invoke(int $deliveryId): JsonResponse
    {
        $delivery = DeliveryModel::with(['order', 'driver']) // Assuming relations exist
        ->findOrFail($deliveryId);

        return response()->json($delivery);
    }
}
