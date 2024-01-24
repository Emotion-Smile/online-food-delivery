<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Models\Order\OrderModel;
use Illuminate\Http\Request;

class GetOrderDetailsController extends Controller
{
    public function __invoke(Request $request, int $id)
    {
        $order = OrderModel::with('items')->findOrFail($id);

        return response()->json($order);
    }
}
