<?php

namespace App\Http\Controllers\Api\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu\MenuItemModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeleteMenuItemController extends Controller
{
    public function __invoke(Request $request, int $id): JsonResponse
    {
        $menuItem = MenuItemModel::findOrFail($id);
        $menuItem->delete();

        return response()->json(['message' => 'Menu item deleted successfully']);
    }
}
