<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Models\Order\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetAllOrdersController extends Controller
{
    public function __invoke(Request $request)
    {
        $orders = Auth::user()->orders; // Assuming you want to fetch orders for the logged-in user
        return response()->json($orders);
    }
}
