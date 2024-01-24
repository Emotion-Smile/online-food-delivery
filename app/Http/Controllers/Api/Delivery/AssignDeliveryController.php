<?php

namespace App\Http\Controllers\Api\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Delivery\DeliveryModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AssignDeliveryController extends Controller
{
//    public function __invoke(Request $request, int $id, int $qty, Customer $customer)
    public function __invoke(Request $request, int $deliveryId): JsonResponse
    {
        $validated = $request->validate([
            'driver_id' => 'required|exists:users,id', // Assuming drivers are users
        ]);

        $delivery = DeliveryModel::findOrFail($deliveryId);
        $delivery->driver_id = $validated['driver_id'];
        $delivery->status = 'assigned'; // Update status as necessary
        $delivery->save();

        return response()->json($delivery);
    }
}
