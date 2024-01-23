<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Models\Order\OrderModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateOrderController extends Controller
{
    public function __invoke(Request $request, OrderModel $order): JsonResponse
    {
        $validatedData = $request->validate([
            // Validation rules for updating the order
        ]);

        $order->update($validatedData);

        return response()->json($order);
    }
}
