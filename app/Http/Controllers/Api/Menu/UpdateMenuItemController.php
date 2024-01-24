<?php

namespace App\Http\Controllers\Api\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu\MenuItemModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateMenuItemController extends Controller
{
    public function __invoke(Request $request, int $id): JsonResponse
    {
        $menuItem = MenuItemModel::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'description' => 'string',
            'price' => 'numeric',
            // Validate other fields as necessary
        ]);

        $menuItem->update($validatedData);

        return response()->json($menuItem);
    }
}
