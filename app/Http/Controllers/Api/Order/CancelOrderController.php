<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Models\Order\OrderModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CancelOrderController extends Controller
{
    public function __invoke(Request $request, int $id, OrderModel $order): JsonResponse
    {
//        // Optional: check if the user has permission to delete the order
//        $order->delete();
//        return response()->json(null, 204);
        $order = OrderModel::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Check if the order is already completed or previously cancelled
        if ($order->status === 'completed' || $order->status === 'cancelled') {
            return response()->json(['message' => 'Order cannot be cancelled'], 403);
        }

        $order->update(['status' => 'cancelled']);

        return response()->json(['message' => 'Order cancelled successfully']);
    }
}
