<?php

namespace App\Http\Controllers\Api\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Restaurant\DeliveryModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AssignDeliveryController extends Controller
{
//    public function __invoke(Request $request, int $id, int $qty, Customer $customer)
    public function __invoke(Request $request, int $deliveryId): JsonResponse
    {
        $delivery = DeliveryModel::findOrFail($deliveryId);
        // logic to assign delivery
        return response()->json($delivery);
    }
}
