<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Models\Menu\MenuItemModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceOrderController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
//        $validatedData = $request->validate([
//            // Validation rules for the order data
//        ]);
//        $order = Auth::user()->orders()->create($validatedData);
//        // Additional logic to handle order items, etc.
//        return response()->json($order, 201);

        $validatedData = $request->validate([
            'items' => 'required|array',
            'items.*.menu_item_id' => 'required|exists:menu_items,id',
            'items.*.quantity' => 'required|integer|min:1'
        ]);

        $order = Auth::user()->orders()->create([
            'total_price' => 0, // Initialize with zero, calculate later
            'status' => 'pending'
        ]);

        $totalPrice = 0;
        foreach ($validatedData['items'] as $item) {
            $menuItem = MenuItemModel::find($item['menu_item_id']);
            $totalPrice += $menuItem->price * $item['quantity'];

            // Add items to order
            $order->items()->create([
                'menu_item_id' => $menuItem->id,
                'quantity' => $item['quantity'],
                'price' => $menuItem->price
            ]);
        }

        $order->update(['total_price' => $totalPrice]);

        return response()->json($order, 201);
    }
}
