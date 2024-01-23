<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Models\Order\OrderModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CancelOrderController extends Controller
{
    public function __invoke(Request $request, OrderModel $order): JsonResponse
    {
// Optional: check if the user has permission to delete the order
        $order->delete();

        return response()->json(null, 204);
    }
}
