<?php

namespace App\Http\Controllers\Api\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Restaurant\DeliveryModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TrackDeliveryController extends Controller
{
    public function __invoke(int $deliveryId): JsonResponse
    {
        $delivery = DeliveryModel::findOrFail($deliveryId);
        // logic to track delivery
        return response()->json($delivery);
    }
}
