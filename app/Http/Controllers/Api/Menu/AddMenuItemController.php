<?php

namespace App\Http\Controllers\Api\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu\MenuItemModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AddMenuItemController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string',
            'price' => 'required|numeric',
            'restaurant_id' => 'required|exists:restaurants,id',
            // Add other fields as necessary
        ]);

        $menuItem = MenuItemModel::create($validatedData);

        return response()->json($menuItem, 201);
    }
}
